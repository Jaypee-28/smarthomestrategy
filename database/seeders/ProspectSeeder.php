<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prospect;
use Illuminate\Support\Facades\File;

class ProspectSeeder extends Seeder
{
    public function run(): void
    {
        $prospectFile = database_path('data/prospect_crm.md');
        $pitchFile = database_path('data/pitch_crm.md');

        $prospectsData = $this->parseMarkdownTable($prospectFile, ['Company', 'Contact Name', 'Title', 'Email', 'Niche', 'Status']);
        // The column in prospect_crm.md might be "Email" or "Email (Estimated)"
        if (empty($prospectsData)) {
            $prospectsData = $this->parseMarkdownTable($prospectFile, ['Company', 'Contact Name', 'Title', 'Email (Estimated)', 'Niche', 'Status']);
        }
        
        $pitchData = $this->parseMarkdownTable($pitchFile, ['Company', 'CEO', 'Template', 'The Personalized Hook']);

        foreach ($prospectsData as $p) {
            $matchedPitch = null;
            $companyName = trim(str_replace('**', '', $p['Company']));
            
            foreach ($pitchData as $pitch) {
                $pitchCompany = trim(str_replace('**', '', $pitch['Company']));
                if (stripos($companyName, $pitchCompany) !== false || stripos($pitchCompany, $companyName) !== false) {
                    $matchedPitch = $pitch;
                    break;
                }
            }

            $emailKey = isset($p['Email (Estimated)']) ? 'Email (Estimated)' : 'Email';

            Prospect::updateOrCreate(
                ['email' => trim($p[$emailKey])],
                [
                    'company' => $companyName,
                    'contact_name' => trim($p['Contact Name']),
                    'title' => trim($p['Title']),
                    'niche' => trim($p['Niche']),
                    'template_id' => $matchedPitch ? trim($matchedPitch['Template']) : null,
                    'hook' => $matchedPitch ? trim($matchedPitch['The Personalized Hook']) : null,
                    'status' => 'Not Contacted',
                ]
            );
        }
    }

    private function parseMarkdownTable($filePath, $expectedHeaders)
    {
        if (!File::exists($filePath)) return [];

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $data = [];
        $isTable = false;
        $headers = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (str_starts_with($line, '|')) {
                $row = array_map('trim', explode('|', trim($line, '|')));
                
                if (!$isTable) {
                    if (str_contains($line, $expectedHeaders[0])) {
                        $isTable = true;
                        $headers = $row;
                    }
                } elseif (str_contains($line, '---')) {
                    continue;
                } else {
                    if (count($row) === count($headers)) {
                        $data[] = array_combine($headers, $row);
                    }
                }
            } else {
                $isTable = false;
            }
        }
        return $data;
    }
}
