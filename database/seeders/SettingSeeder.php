<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'دورات الطوق'],
            ['key' => 'site_description', 'value' => 'منصة تعليمية تقدم دورات تدريبية في مختلف المجالات.'],
            ['key' => 'contact_email', 'value' => 'jerry2562005@gmail.com'],
            ['key' => 'contact_phone', 'value' => '01102495997'],
            ['key' => 'facebook_url', 'value' => 'https://www.facebook.com/share/1GTu9ri7o6/'],
            ['key' => 'twitter_url', 'value' => '', ],
            ['key' => 'linkedin_url', 'value' => 'www.linkedin.com/in/mohamed-abdullah-1890b02ab'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
