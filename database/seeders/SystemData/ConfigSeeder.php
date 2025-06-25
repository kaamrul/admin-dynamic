<?php

namespace Database\Seeders\SystemData;

use App\Models\Config;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // General Settings
            ['key' => 'app_title', 'value' => ''],
            ['key' => 'cancellation_hours', 'value' => '24'],
            // ['key' => 'session_hours', 'value' => '4'],
            ['key' => 'walk_balance_alert', 'value' => '2'],
            ['key' => 'email', 'value' => ''],
            ['key' => 'ticket_email', 'value' => ''],
            ['key' => 'country_code', 'value' => ''],
            ['key' => 'phone', 'value' => ''],
            ['key' => 'logo', 'value' => ''],
            ['key' => 'favicon', 'value' => ''],
            ['key' => 'og_image', 'value' => ''],
            ['key' => 'address', 'value' => ''],
            ['key' => 'city', 'value' => ''],
            ['key' => 'state', 'value' => ''],
            ['key' => 'zip_code', 'value' => ''],
            ['key' => 'country', 'value' => ''],
            ['key' => 'copyright', 'value' => ''],
            ['key' => 'copyright_url', 'value' => ''],
            ['key' => 'currency_name', 'value' => ''],
            ['key' => 'currency_symbol', 'value' => ''],
            ['key' => 'version', 'value' => ''],
            ['key' => 'admin_prefix', 'value' => ''],
            ['key' => 'login_bg_image', 'value' => ''],

            // Email Settings
            ['key' => 'mail_mailer', 'value' => 'smtp'],
            ['key' => 'mail_host', 'value' => 'smtp.gmail.com'],
            ['key' => 'mail_port', 'value' => '587'],
            ['key' => 'mail_username', 'value' => ''],
            ['key' => 'mail_password', 'value' => ''],
            ['key' => 'mail_from_address', 'value' => 'hello@example.com'],
            ['key' => 'mail_from_name', 'value' => 'You App Name'],
            ['key' => 'mail_encryption', 'value' => 'tls'],

            // Social Link Share
            ['key' => 'facebook_link', 'value' => '#'],
            ['key' => 'twitter_link', 'value' => '#'],
            ['key' => 'instagram_link', 'value' => '#'],
            ['key' => 'linkedin_link', 'value' => '#'],
            ['key' => 'youtube_link', 'value' => '#'],

            ['key' => 'system_launch_date', 'value' => ''],
            ['key' => 'date_format', 'value' => 'DD-MM-YYYY'],
            ['key' => 'time_format', 'value' => '24h'],

            // Allow Note Edit Within (hours)
            ['key' => 'note_editable_duration', 'value' => '24'],
            ['key' => 'walks_rate', 'value' => '20'],
        ];

        DB::table('configs')->insertOrIgnore($data);
    }
}
