<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Prospect;
use App\Models\PitchTemplate;
use Illuminate\Support\Facades\Mail;
use App\Mail\OutboundPitch;
use App\Mail\AdminBatchReport;
use Carbon\Carbon;

class SendAutomatedPitches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-automated-pitches {--limit=5 : The number of emails to send per batch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically send initial pitches and follow-ups to prospects';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $limit = (int) $this->option('limit');
        $prospectsToEmail = [];
        
        $this->info("Starting automated pitch batch. Limit: {$limit}");

        // 1. Prioritize Follow Up 2 (6 days after Follow Up 1)
        $fu2 = Prospect::where('status', 'Follow Up')
            ->where('follow_up_count', 1)
            ->where('last_contacted_at', '<=', Carbon::now()->subDays(6))
            ->limit($limit)
            ->get();
            
        foreach ($fu2 as $p) {
            $prospectsToEmail[] = ['prospect' => $p, 'type' => 'FollowUp2'];
        }

        // 2. Follow Up 1 (2 days after Initial)
        $remaining = $limit - count($prospectsToEmail);
        if ($remaining > 0) {
            $fu1 = Prospect::where('status', 'Sent')
                ->where('last_contacted_at', '<=', Carbon::now()->subDays(2))
                ->limit($remaining)
                ->get();
                
            foreach ($fu1 as $p) {
                $prospectsToEmail[] = ['prospect' => $p, 'type' => 'FollowUp1'];
            }
        }

        // 3. Initial Pitch
        $remaining = $limit - count($prospectsToEmail);
        if ($remaining > 0) {
            $initial = Prospect::where('status', 'Not Contacted')
                ->limit($remaining)
                ->get();
                
            foreach ($initial as $p) {
                $prospectsToEmail[] = ['prospect' => $p, 'type' => 'Initial'];
            }
        }

        if (count($prospectsToEmail) === 0) {
            $this->info("No eligible prospects found for this batch.");
            return;
        }

        // Load templates
        $templatesFromDb = PitchTemplate::all();
        $templates = [];
        foreach ($templatesFromDb as $t) {
            $templates[$t->key] = [
                'subject' => $t->subject,
                'body' => $t->body
            ];
        }

        $sentEmails = [];

        foreach ($prospectsToEmail as $item) {
            $prospect = $item['prospect'];
            $type = $item['type'];
            
            $this->info("Processing {$prospect->email} - Type: {$type}");
            
            $body = '';
            $subject = '';

            if ($type === 'Initial') {
                $templateKey = $prospect->template_id;
                $templateData = $templates[$templateKey] ?? null;
                
                if ($templateData) {
                    $subject = $templateData['subject'];
                    $body = $templateData['body'];
                }
            } 
            else if ($type === 'FollowUp1') {
                $templateData = $templates['FollowUp1'] ?? null;
                if ($templateData) {
                    $subject = $templateData['subject'];
                    $body = $templateData['body'];
                }
            } 
            else if ($type === 'FollowUp2') {
                $templateData = $templates['FollowUp2'] ?? null;
                if ($templateData) {
                    $subject = $templateData['subject'];
                    $body = $templateData['body'];
                }
            }

            // Fallbacks in case templates are missing
            if (empty($subject)) {
                $subject = 'Re: SmartHomeStrategy.com + {company}';
            }
            if (empty($body)) {
                $this->error("No body found for template type {$type}, skipping {$prospect->email}");
                continue;
            }

            // Replace tokens
            $firstName = $prospect->contact_name ? explode(' ', trim($prospect->contact_name))[0] : 'there';
            $company = $prospect->company ?? '';
            $hook = $prospect->hook ?? '';
            
            $replacements = [
                '{firstname}' => $firstName,
                '{company}' => $company,
                '{hook}' => $hook
            ];
            
            foreach ($replacements as $key => $val) {
                $subject = str_ireplace($key, $val, $subject);
                $body = str_ireplace($key, $val, $body);
            }

            // Send via Mail
            try {
                Mail::to($prospect->email)->send(new OutboundPitch($subject, $body));
                
                // Update DB state
                if ($type === 'Initial') {
                    $prospect->update(['status' => 'Sent', 'last_contacted_at' => now()]);
                } else {
                    $prospect->increment('follow_up_count');
                    $prospect->update([
                        'last_contacted_at' => now(),
                        'status' => 'Follow Up'
                    ]);
                }

                $sentEmails[] = [
                    'company' => $prospect->company,
                    'name' => $prospect->contact_name,
                    'email' => $prospect->email,
                    'type' => $type
                ];

                $this->info("Successfully sent to {$prospect->email}");
            } catch (\Exception $e) {
                $this->error("Failed to send to {$prospect->email}: " . $e->getMessage());
            }
        }

        // Send summary to admin
        if (count($sentEmails) > 0) {
            $this->info("Sending summary report to admin.");
            try {
                Mail::to('maxwell@smarthomestrategy.com')->send(new AdminBatchReport($sentEmails));
            } catch (\Exception $e) {
                $this->error("Failed to send admin report: " . $e->getMessage());
            }
        }
        
        $this->info("Batch complete.");
    }
}
