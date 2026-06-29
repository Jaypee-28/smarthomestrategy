<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PitchTemplate;

class PitchTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'key' => 'A',
                'subject' => 'SmartHomeStrategy.com + {company}',
                'body' => "Hello {firstname},\n\n{hook}\nWe are the owners of the premium digital asset SmartHomeStrategy.com and are quietly initiating private acquisition discussions. Given your recent capital influx and push to dominate the sector, securing this asset gives you an immediate, defensible moat in the space.\n\nAre you handling M&A and brand assets right now, or should I speak with your CMO?\n\nBest regards\nMaxwell Johnpaul\nSmarthomeStrategy.com",
            ],
            [
                'key' => 'B',
                'subject' => 'Acquisition of SmartHomeStrategy.com',
                'body' => "Hello {firstname},\n\n{hook}\nI’m reaching out because my team is preparing to privately sell the asset SmartHomeStrategy.com. We identified your company as a prime acquisition partner because owning this asset positions you as the definitive authority to real estate developers deciding on their tech stack.\n\nIs acquiring strategic digital real estate on your roadmap for this quarter?\n\nBest regards\nMaxwell Johnpaul\nSmarthomeStrategy.com",
            ],
            [
                'key' => 'C',
                'subject' => 'SmartHomeStrategy.com',
                'body' => "Hello {firstname},\n\n{hook}\nAs your company continues to expand its hardware ecosystem, controlling the high-level narrative is critical. We are the owners of SmartHomeStrategy.com and are looking for the right organization to acquire the domain and asset.\n\nIt’s a perfect fit to launch a consulting arm, partner network, or enterprise offering.\n\nAre you open to a brief chat about acquiring this?\n\nBest regards\nMaxwell Johnpaul\nSmarthomeStrategy.com",
            ],
            [
                'key' => 'D',
                'subject' => 'digital asset: SmartHomeStrategy.com',
                'body' => "Hello {firstname},\n\n{hook}\nWe are the owners of SmartHomeStrategy.com and are initiating a private sale. We specifically flagged your company because an AI-driven operating system needs a category-defining domain to build enterprise trust.\n\nAre you the right person to speak with about acquiring strategic assets, or is there a VP of Growth I should ping?\n\nBest regards\nMaxwell Johnpaul\nSmarthomeStrategy.com",
            ],
            [
                'key' => 'FollowUp1',
                'subject' => 'Re: SmartHomeStrategy.com + {company}',
                'body' => "Hello {firstname},\n\nJust floating this to the top of your inbox.\n\nAre you the right person to speak with regarding digital asset acquisitions, or is there someone else on your team handling M&A that I should be speaking to?\n\nBest regards\nMaxwell Johnpaul\nSmarthomeStrategy.com",
            ],
            [
                'key' => 'FollowUp2',
                'subject' => 'Re: SmartHomeStrategy.com + {company}',
                'body' => "Hello {firstname},\n\nI haven't heard back, so I'll assume acquiring new strategic assets isn't a priority for your team this quarter.\n\nWe are opening discussions with other players in the space this week. If things change on your end, let me know.\n\nBest regards\nMaxwell Johnpaul\nSmarthomeStrategy.com",
            ],
        ];

        foreach ($templates as $template) {
            PitchTemplate::updateOrCreate(
                ['key' => $template['key']],
                [
                    'subject' => $template['subject'],
                    'body' => $template['body'],
                ]
            );
        }
    }
}
