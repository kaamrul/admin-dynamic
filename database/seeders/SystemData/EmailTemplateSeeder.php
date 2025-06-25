<?php

namespace Database\Seeders\SystemData;

use App\Library\Enum;
use App\Models\EmailTemplate;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = self::getRecords();

        foreach ($records as $record) {
            $exists = EmailTemplate::where('key', $record['key'])->exists();

            if ($exists) {
                continue;
            }

            EmailTemplate::Create($record);
        }
    }

    private static function getRecords()
    {
        return [
            //=====--- Ticket --=========//
            // [
            //     'name'       => 'Ticket Created',
            //     'key'        => Enum::EMAIL_TICKET_CREATE,
            //     'subject'    => 'You have been opened a ticket',
            //     'message'    => self::getContent(Enum::EMAIL_TICKET_CREATE),
            //     'shortcodes' => 'receiver_name,ticket_id,reply_message',
            // ],
            // [
            //     'name'       => 'Ticket Assigned',
            //     'key'        => Enum::EMAIL_TICKET_ASSIGN,
            //     'subject'    => 'You have been Assigned To a ticket',
            //     'message'    => self::getContent(Enum::EMAIL_TICKET_ASSIGN),
            //     'shortcodes' => 'assign_to',
            // ],
            // [
            //     'name'       => 'Ticket Replied',
            //     'key'        => Enum::EMAIL_TICKET_REPLY,
            //     'subject'    => 'You have been Replied a ticket',
            //     'message'    => self::getContent(Enum::EMAIL_TICKET_REPLY),
            //     'shortcodes' => 'reply_message,reply_to',
            // ],
            // [
            //     'name'       => 'Stock Assign',
            //     'key'        => Enum::EMAIL_STOCK_ASSIGN,
            //     'subject'    => 'A new Stock Assign for You',
            //     'message'    => self::getContent(Enum::EMAIL_STOCK_ASSIGN),
            //     'shortcodes' => 'product_name,quantity,note,assign_to',
            // ],
            // [
            //     'name'       => 'Purchease Payment Failed',
            //     'key'        => Enum::EMAIL_PAYMENT_FAILED,
            //     'subject'    => 'Your purchease payment is failed',
            //     'message'    => self::getContent(Enum::EMAIL_PAYMENT_FAILED),
            //     'shortcodes' => 'product_name',
            // ],
            [
                'name'       => '2 FA',
                'key'        => Enum::FA_2,
                'subject'    => 'A new message for 2 FA',
                'message'    => self::getContent(Enum::FA_2),
                'shortcodes' => 'email,full_name',
            ],
            [
                'name'       => 'Sign up Welcome',
                'key'        => Enum::SIGN_UP_WELCOME,
                'subject'    => 'A new message for Sign up Welcome',
                'message'    => self::getContent(Enum::SIGN_UP_WELCOME),
                'shortcodes' => 'full_name,email,phone',
            ],
            // [
            //     'name'       => 'Purchease confirmation',
            //     'key'        => Enum::PURCHEASE_CONFIRMATION,
            //     'subject'    => 'A new message for Purchease confirmation',
            //     'message'    => self::getContent(Enum::PURCHEASE_CONFIRMATION),
            //     'shortcodes' => 'invoice_id,customer_name,',
            // ],
            // [
            //     'name'       => 'Booking Confirmation',
            //     'key'        => Enum::BOOKING_CONFIRMATION,
            //     'subject'    => 'A new message for booking confirmation',
            //     'message'    => self::getContent(Enum::BOOKING_CONFIRMATION),
            //     'shortcodes' => 'booking_start_date,booking_end_date,booking_start_time,booking_end_time,',
            // ],
            // [
            //     'name'       => 'Pick up Notification night before',
            //     'key'        => Enum::PICK_UP_NOTIFICATION,
            //     'subject'    => 'A new message for pick up notification night before',
            //     'message'    => self::getContent(Enum::PICK_UP_NOTIFICATION),
            //     'shortcodes' => 'message',
            // ],
            // [
            //     'name'       => 'Notification email when session balance is too low',
            //     'key'        => Enum::NOTIFICATION_EMAIL,
            //     'subject'    => 'Alert message for your session balance is to low',
            //     'message'    => self::getContent(Enum::NOTIFICATION_EMAIL),
            //     'shortcodes' => 'session_balance,message',
            // ],
        ];
    }

    private static function getContent($key)
    {
        return file_get_contents(__DIR__ . '/emails/' . $key . '.php');
    }
}
