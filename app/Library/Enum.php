<?php

namespace App\Library;

use Illuminate\Support\Str;

class Enum
{
    // Vite Resources Path
    public const LOGO_PATH = 'resources/images/logo.png';
    public const ICON_PATH = 'resources/images/favicon.ico';
    public const NO_IMAGE_PATH = 'resources/images/noimage.jpg';
    public const NO_AVATAR_PATH = 'resources/images/no_avatar.png';
    public const LOGIN_BACKGROUND_PATH = 'resources/images/background.jpg';
    public const STAR_IMAGE_PATH = 'resources/images/star.png';
    public const FILE_ICON = 'resources/images/file-icon.png';
    public const DEFAULT_CATEGORY_IMAGE_PATH = 'resources/images/noimage.jpg';
    public const HERO_IMAGE_PATH = 'resources/images/background.jpg';
    public const HERO_BG_IMAGE1_PATH = 'resources/images/background.jpg';
    public const HERO_BG_IMAGE2_PATH = 'resources/images/background.jpg';
    public const HERO_BG_IMAGE3_PATH = 'resources/images/background.jpg';


    //============= End Frontend landing Page Image =================//
    public const ROLE_SUPER_ADMIN_SLUG = 'super-admin';
    public const QRCODE_DIR = 'storage/qrcode/';
    public const CONFIG_IMAGE_DIR = 'storage/config';
    public const NEWS_FEATURE_IMAGE = 'storage/news';
    public const BLOG_FEATURE_IMAGE = 'storage/blog';
    public const PAGE_IMAGE = 'storage/page';
    public const USER_AVATAR_DIR = 'storage/user/avatar';
    public const NO_DATA_IMAGE_PATH = 'resources/images/nodata.png';

    //===========------- Email Settings Start ----================//
    // public const EMAIL_TICKET_CREATE = 'ticket_create';
    // public const EMAIL_TICKET_ASSIGN = 'ticket_assign';
    // public const EMAIL_TICKET_REPLY = 'ticket_reply';
    // public const EMAIL_VERIFY_MEMBER = 'verify_member';
    // public const EMAIL_PAYMENT_FAILED = 'payment_failed';
    // public const SUBSCRIPTION_BUY = 'subscription_buy';
    public const FA_2 = '2_fa';
    public const SIGN_UP_WELCOME = 'sign_up_welcome';
    // public const NOTIFICATION_EMAIL = 'notification_email';

    //===========------- Email Settings End ----================//

    /* ============== USER MODULE ===================*/
    public const USER_TYPE_SUPER_ADMIN = 'super-admin';
    public const USER_TYPE_ADMIN = 'admin';
    public const USER_TYPE_EMPLOYEE = 'employee';
    public const USER_TYPE_CLIENT = 'client';

    public static function getUserType(mixed $type = null)
    {
        $types = [
            self::USER_TYPE_SUPER_ADMIN => 'Database User',
            self::USER_TYPE_ADMIN => 'Admin',
            self::USER_TYPE_EMPLOYEE => 'Employee',
            self::USER_TYPE_CLIENT => 'Client',
        ];

        if (is_array($type) && !empty($type)) {
            foreach ($type as $value) {
                $result[$value] = $types[$value];
            }

            return $result;
        }

        $sortedTypes = sortByValueAsc($types);

        return $type ? $types[$type] : $sortedTypes;
    }

    public const USER_STATUS_PENDING = 'pending';
    public const USER_STATUS_ACTIVE = 'active';
    public const USER_STATUS_SUSPENDED = 'suspended';

    public static function getUserStatus(string $type = null)
    {
        $types = [
            self::USER_STATUS_PENDING => "Pending",
            self::USER_STATUS_ACTIVE => "Active",
            self::USER_STATUS_SUSPENDED => "Suspended",
        ];

        if (isset($type)) {
            return $types[$type];
        }

        // $sortedTypes = sortByValueAsc($types);

        return $type ? $types[$type] : $types;
    }

    /* ============== END ===================*/


    /* ============== CONFIG MODULE ===================*/
    public const CONFIG_DROPDOWN_DESIGNATION = 'designation';
    public const CONFIG_DROPDOWN_BLOG_CATEGORY = 'blog_category';
    public const CONFIG_DROPDOWN_BLOG_TAG = 'blog_tag';
    public const CONFIG_DROPDOWN_GENDER = 'gender';

    public static function getConfigDropdown(string $key = null)
    {
        $dropdowns = [
            self::CONFIG_DROPDOWN_DESIGNATION => "Designation",
            self::CONFIG_DROPDOWN_BLOG_CATEGORY => "Blog Type",
            self::CONFIG_DROPDOWN_BLOG_TAG => "Blog Tags",
            self::CONFIG_DROPDOWN_GENDER => "Gender",
        ];

        return $key ? $dropdowns[$key] : $dropdowns;
    }

    /* ============== END ===================*/

    public static function systemShortcodesWithValues()
    {
        return [
            'current_date' => now()->format('Y-m-d'),
            'current_datetime' => '',
            'current_time' => '',
            'system_url' => '',
            'app_name' => '',
        ];
    }


    // Payment Status
    public const PAYMENT_STATUS_SUCCESS = 'success';
    public const PAYMENT_STATUS_FAILED = 'failed';
    public const PAYMENT_STATUS_ABUNDANT = 'abundant';

    public static function getPaymentStatus(string $type = null)
    {
        $types = [
            self::PAYMENT_STATUS_SUCCESS => "Success",
            self::PAYMENT_STATUS_FAILED => "Failed",
            self::PAYMENT_STATUS_ABUNDANT => "Abundant",
        ];

        $sortedTypes = sortByValueAsc($types);

        return $type ? $types[$type] : $sortedTypes;
    }

    // Payment Methods
    public const PAYMENT_METHOD_STRIPE = 'stripe';
    public const PAYMENT_METHOD_MANUAL = 'manual';
    public const PAYMENT_METHOD_WALLET = 'wallet';

    public static function getPaymentMethod(string $type = null)
    {
        $types = [
            self::PAYMENT_METHOD_STRIPE => "Stripe",
            self::PAYMENT_METHOD_MANUAL => "Manual",
            self::PAYMENT_METHOD_WALLET => "Wallet",
        ];

        $sortedTypes = sortByValueAsc($types);

        return $type ? $types[$type] : $sortedTypes;
    }

    // Start General Status
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public static function getStatus(string $type = null)
    {
        $types = [
            self::STATUS_ACTIVE => "Active",
            self::STATUS_INACTIVE => "Inactive",
        ];

        if (isset($type) && $type == 0) {
            return $types[$type];
        }

        $sortedTypes = sortByValueAsc($types);

        return $type ? $types[$type] : $sortedTypes;
    }
    // End General Status
}
