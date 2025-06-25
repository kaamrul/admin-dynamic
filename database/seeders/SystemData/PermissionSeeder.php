<?php

namespace Database\Seeders\SystemData;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public const MENU_GROUP_PROFILE = 'profile';
    public const MENU_GROUP_BOOKING = 'booking';
    public const MENU_GROUP_PURCHASE = 'purchase';
    public const MENU_GROUP_SUPPORT = 'support';
    public const MENU_GROUP_WEBSITE = 'website';
    public const MENU_GROUP_SETTINGS = 'settings';
    public const MENU_GROUP_MORE_SETTINGS = 'more_settings';
    public const MENU_GROUP_REPORT = 'report';
    public const MENU_GROUP_FOOT_PRINT = 'foot_print';
    public const MENU_GROUP_TICKET = 'ticket';

    // Profile Menu Group
    public const GROUP_USER = 'user';
    public const GROUP_EMPLOYEE = 'employee';
    public const GROUP_EMPLOYEE_NOTE = 'employee_note';
    public const GROUP_CUSTOMER = 'customer';
    public const GROUP_DOG = 'dog';
    public const GROUP_DOG_NOTE = 'dog_note';
    public const GROUP_DRIVER = 'driver';
    public const GROUP_DRIVER_NOTE = 'driver_note';
    public const GROUP_VAN = 'van';
    public const GROUP_VAN_NOTE = 'van_note';

    // Booking Menu Group
    public const GROUP_BOOKING = 'booking';

    // Purchase Menu Group
    public const GROUP_PURCHASE = 'purchase';

    // Support Menu Group
    public const GROUP_CONTACT_US = 'contact_us';

    // Website Menu Group
    public const GROUP_FILE_UPLOAD = 'file_upload';

    // Configuration Menu Group
    public const GROUP_GENERAL_SETTINGS = 'general_settings';
    public const GROUP_ROLE = 'role';
    public const GROUP_DROPDOWN = 'dropdown';
    // More Settings Sub Menu Group
        public const GROUP_EMAIL_SIGNATURE = 'email_signature';
        public const GROUP_EMAIL_SETTINGS = 'email_settings';
        public const GROUP_SOCIAL_LINK = 'social_link';
        public const GROUP_EMAIL_TEMPLATE = 'email_template';  
        public const GROUP_HOLIDAY = 'holiday';
        public const GROUP_TERRITORY = 'territory';
        public const GROUP_PRODUCT = 'product';
        public const GROUP_SESSION = 'session';
    
    // Report Menu Group
    public const GROUP_REPORT = 'report';

    // Foot Print Menu Group
    public const GROUP_LOG = 'log';

    // Ticket Menu Group
    public const GROUP_TICKET = 'ticket';

    public function run()
    {
        Permission::whereNotNull('id')->delete();

        $admin_role = Role::where('slug', 'super-admin')->first();

        foreach ($this->permissions() as $p) {
            $permission = new Permission();
            $permission->name = $p['name'];
            $permission->slug = $p['slug'];
            $permission->group = $p['group'];
            $permission->menu_group = $p['menu_group'];
            $permission->save();

            if ($admin_role) {
                $admin_role->permissions()->attach($permission);
            }
        }
    }


    private function permissions()
    {
        return [
            // Common permission for User (Admin/Employee/Customer/Driver)
            [
                'name'       => 'Update Status',
                'slug'       => self::GROUP_USER . '_update_status',
                'group'      => self::GROUP_USER,
                'menu_group' => self::MENU_GROUP_PROFILE
            ],
            [
                'name'       => 'Update Password',
                'slug'       => self::GROUP_USER . '_update_password',
                'group'      => self::GROUP_USER,
                'menu_group' => self::MENU_GROUP_PROFILE
            ],
            [
                'name'       => 'Delete',
                'slug'       => self::GROUP_USER . '_delete',
                'group'      => self::GROUP_USER,
                'menu_group' => self::MENU_GROUP_PROFILE
            ],
            [
                'name'       => 'Restore',
                'slug'       => self::GROUP_USER . '_restore',
                'group'      => self::GROUP_USER,
                'menu_group' => self::MENU_GROUP_PROFILE
            ],
            [
                'name'       => 'Profile',
                'slug'       => self::GROUP_USER . '_profile_index',
                'group'      => self::GROUP_USER,
                'menu_group' => self::MENU_GROUP_PROFILE
            ],
            [
                'name'       => 'Update Profile',
                'slug'       => self::GROUP_USER . '_profile_update',
                'group'      => self::GROUP_USER,
                'menu_group' => self::MENU_GROUP_PROFILE
            ],
            // [
            //     'name'       => 'Profile Notification',
            //     'slug'       => self::GROUP_USER . '_profile_all_notification',
            //     'group'      => self::GROUP_USER,
            //     'menu_group' => self::MENU_GROUP_PROFILE
            // ],

            // Employee
            [
                'name' => 'List',
                'slug' => self::GROUP_EMPLOYEE . '_index',
                'group' => self::GROUP_EMPLOYEE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_EMPLOYEE . '_create',
                'group' => self::GROUP_EMPLOYEE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_EMPLOYEE . '_update',
                'group' => self::GROUP_EMPLOYEE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'View',
                'slug' => self::GROUP_EMPLOYEE . '_show',
                'group' => self::GROUP_EMPLOYEE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Details',
                'slug' => self::GROUP_EMPLOYEE . '_details',
                'group' => self::GROUP_EMPLOYEE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Security',
                'slug' => self::GROUP_EMPLOYEE . '_security',
                'group' => self::GROUP_EMPLOYEE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Security Update',
                'slug' => self::GROUP_EMPLOYEE . '_security_update',
                'group' => self::GROUP_EMPLOYEE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Change Employee to Driver',
                'slug' => self::GROUP_EMPLOYEE . '_change_to_driver',
                'group' => self::GROUP_EMPLOYEE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],

            // Employee Note
            [
                'name' => 'List',
                'slug' => self::GROUP_EMPLOYEE_NOTE . '_index',
                'group' => self::GROUP_EMPLOYEE_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_EMPLOYEE_NOTE . '_create',
                'group' => self::GROUP_EMPLOYEE_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_EMPLOYEE_NOTE . '_update',
                'group' => self::GROUP_EMPLOYEE_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_EMPLOYEE_NOTE . '_delete',
                'group' => self::GROUP_EMPLOYEE_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],

            // Customer
            [
                'name' => 'List',
                'slug' => self::GROUP_CUSTOMER . '_index',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_CUSTOMER . '_create',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_CUSTOMER . '_update',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'View',
                'slug' => self::GROUP_CUSTOMER . '_show',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Details',
                'slug' => self::GROUP_CUSTOMER . '_details',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'List of Dogs',
                'slug' => self::GROUP_CUSTOMER . '_dog_list',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Note Show',
                'slug' => self::GROUP_CUSTOMER . '_note_index',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Note Create',
                'slug' => self::GROUP_CUSTOMER . '_note_create',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Note Update',
                'slug' => self::GROUP_CUSTOMER . '_note_update',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Note Delete',
                'slug' => self::GROUP_CUSTOMER . '_note_delete',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Purchases List',
                'slug' => self::GROUP_CUSTOMER . '_purchases_list',
                'group' => self::GROUP_CUSTOMER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],

            // Dog
            [
                'name' => 'List',
                'slug' => self::GROUP_DOG . '_index',
                'group' => self::GROUP_DOG,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_DOG . '_create',
                'group' => self::GROUP_DOG,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_DOG . '_update',
                'group' => self::GROUP_DOG,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Show',
                'slug' => self::GROUP_DOG . '_show',
                'group' => self::GROUP_DOG,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_DOG . '_delete',
                'group' => self::GROUP_DOG,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Status Update',
                'slug' => self::GROUP_DOG . '_status',
                'group' => self::GROUP_DOG,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Temperament Update',
                'slug' => self::GROUP_DOG . '_temperament',
                'group' => self::GROUP_DOG,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Dashboard',
                'slug' => self::GROUP_DOG . '_dashboard',
                'group' => self::GROUP_DOG,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Booking',
                'slug' => self::GROUP_DOG . '_booking',
                'group' => self::GROUP_DOG,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],

            // Dog Note
            [
                'name' => 'List',
                'slug' => self::GROUP_DOG_NOTE . '_index',
                'group' => self::GROUP_DOG_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_DOG_NOTE . '_create',
                'group' => self::GROUP_DOG_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_DOG_NOTE . '_update',
                'group' => self::GROUP_DOG_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_DOG_NOTE . '_delete',
                'group' => self::GROUP_DOG_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],

            // Driver
            [
                'name' => 'List',
                'slug' => self::GROUP_DRIVER . '_index',
                'group' => self::GROUP_DRIVER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_DRIVER . '_create',
                'group' => self::GROUP_DRIVER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_DRIVER . '_update',
                'group' => self::GROUP_DRIVER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'View',
                'slug' => self::GROUP_DRIVER . '_show',
                'group' => self::GROUP_DRIVER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Details',
                'slug' => self::GROUP_DRIVER . '_details',
                'group' => self::GROUP_DRIVER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'List of Dogs',
                'slug' => self::GROUP_DRIVER . '_dog_list',
                'group' => self::GROUP_DRIVER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'List of Vans',
                'slug' => self::GROUP_DRIVER . '_van_list',
                'group' => self::GROUP_DRIVER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'List of Walks',
                'slug' => self::GROUP_DRIVER . '_walk_list',
                'group' => self::GROUP_DRIVER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Change Driver to Employee',
                'slug' => self::GROUP_DRIVER . '_change_to_employee',
                'group' => self::GROUP_DRIVER,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],

            // Driver Note
            [
                'name' => 'List',
                'slug' => self::GROUP_DRIVER_NOTE . '_index',
                'group' => self::GROUP_DRIVER_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_DRIVER_NOTE . '_create',
                'group' => self::GROUP_DRIVER_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_DRIVER_NOTE . '_update',
                'group' => self::GROUP_DRIVER_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_DRIVER_NOTE . '_delete',
                'group' => self::GROUP_DRIVER_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],

            // Van
            [
                'name' => 'List',
                'slug' => self::GROUP_VAN . '_index',
                'group' => self::GROUP_VAN,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_VAN . '_create',
                'group' => self::GROUP_VAN,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_VAN . '_update',
                'group' => self::GROUP_VAN,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Show',
                'slug' => self::GROUP_VAN . '_show',
                'group' => self::GROUP_VAN,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_VAN . '_delete',
                'group' => self::GROUP_VAN,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Status Update',
                'slug' => self::GROUP_VAN . '_status',
                'group' => self::GROUP_VAN,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Dogs List',
                'slug' => self::GROUP_VAN . '_dog_list',
                'group' => self::GROUP_VAN,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Driver List',
                'slug' => self::GROUP_VAN . '_driver_list',
                'group' => self::GROUP_VAN,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Booking List',
                'slug' => self::GROUP_VAN . '_booking_list',
                'group' => self::GROUP_VAN,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],

            // Van Note
            [
                'name' => 'List',
                'slug' => self::GROUP_VAN_NOTE . '_index',
                'group' => self::GROUP_VAN_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_VAN_NOTE . '_create',
                'group' => self::GROUP_VAN_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_VAN_NOTE . '_update',
                'group' => self::GROUP_VAN_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_VAN_NOTE . '_delete',
                'group' => self::GROUP_VAN_NOTE,
                'menu_group' => self::MENU_GROUP_PROFILE,
            ],

            // Booking
            [
                'name' => 'List',
                'slug' => self::GROUP_BOOKING . '_index',
                'group' => self::GROUP_BOOKING,
                'menu_group' => self::MENU_GROUP_BOOKING,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_BOOKING . '_create',
                'group' => self::GROUP_BOOKING,
                'menu_group' => self::MENU_GROUP_BOOKING,
            ],
            [
                'name' => 'Show',
                'slug' => self::GROUP_BOOKING . '_show',
                'group' => self::GROUP_BOOKING,
                'menu_group' => self::MENU_GROUP_BOOKING,
            ],
            [
                'name' => 'Cancel',
                'slug' => self::GROUP_BOOKING . '_cancel',
                'group' => self::GROUP_BOOKING,
                'menu_group' => self::MENU_GROUP_BOOKING,
            ],

            // Purchase
            [
                'name' => 'List',
                'slug' => self::GROUP_PURCHASE . '_index',
                'group' => self::GROUP_PURCHASE,
                'menu_group' => self::MENU_GROUP_PURCHASE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_PURCHASE . '_create',
                'group' => self::GROUP_PURCHASE,
                'menu_group' => self::MENU_GROUP_PURCHASE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_PURCHASE . '_update',
                'group' => self::GROUP_PURCHASE,
                'menu_group' => self::MENU_GROUP_PURCHASE,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_PURCHASE . '_delete',
                'group' => self::GROUP_PURCHASE,
                'menu_group' => self::MENU_GROUP_PURCHASE,
            ],

            // Contact us
            [
                'name' => 'List',
                'slug' => self::GROUP_CONTACT_US . '_index',
                'group' => self::GROUP_CONTACT_US,
                'menu_group' => self::MENU_GROUP_SUPPORT,
            ],
            [
                'name' => 'Status',
                'slug' => self::GROUP_CONTACT_US . '_status',
                'group' => self::GROUP_CONTACT_US,
                'menu_group' => self::MENU_GROUP_SUPPORT,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_CONTACT_US . '_delete',
                'group' => self::GROUP_CONTACT_US,
                'menu_group' => self::MENU_GROUP_SUPPORT,
            ],
            // File Upload
            [
                'name' => 'List',
                'slug' => self::GROUP_FILE_UPLOAD . '_index',
                'group' => self::GROUP_FILE_UPLOAD,
                'menu_group' => self::MENU_GROUP_WEBSITE,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_FILE_UPLOAD . '_create',
                'group' => self::GROUP_FILE_UPLOAD,
                'menu_group' => self::MENU_GROUP_WEBSITE,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_FILE_UPLOAD . '_update',
                'group' => self::GROUP_FILE_UPLOAD,
                'menu_group' => self::MENU_GROUP_WEBSITE,
            ],
            [
                'name' => 'Show',
                'slug' => self::GROUP_FILE_UPLOAD . '_show',
                'group' => self::GROUP_FILE_UPLOAD,
                'menu_group' => self::MENU_GROUP_WEBSITE,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_FILE_UPLOAD . '_delete',
                'group' => self::GROUP_FILE_UPLOAD,
                'menu_group' => self::MENU_GROUP_WEBSITE,
            ],

            //================== Settings menu =====================//
            // Role Permissions
            [
                'name' => 'List',
                'slug' => self::GROUP_ROLE . '_index',
                'group' => self::GROUP_ROLE,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_ROLE . '_create',
                'group' => self::GROUP_ROLE,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'View',
                'slug' => self::GROUP_ROLE . '_show',
                'group' => self::GROUP_ROLE,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_ROLE . '_update',
                'group' => self::GROUP_ROLE,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_ROLE . '_delete',
                'group' => self::GROUP_ROLE,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'Permission',
                'slug' => self::GROUP_ROLE . '_permission',
                'group' => self::GROUP_ROLE,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'Permission Update',
                'slug' => self::GROUP_ROLE . '_permission_update',
                'group' => self::GROUP_ROLE,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],

            // Dropdown
            [
                'name' => 'Dropdown List',
                'slug' => self::GROUP_DROPDOWN . '_index',
                'group' => self::GROUP_DROPDOWN,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'Create Dropdown',
                'slug' => self::GROUP_DROPDOWN . '_create',
                'group' => self::GROUP_DROPDOWN,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'Update Dropdown',
                'slug' => self::GROUP_DROPDOWN . '_update',
                'group' => self::GROUP_DROPDOWN,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'Delete Dropdown',
                'slug' => self::GROUP_DROPDOWN . '_delete',
                'group' => self::GROUP_DROPDOWN,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'View',
                'slug' => self::GROUP_GENERAL_SETTINGS . '_show',
                'group' => self::GROUP_GENERAL_SETTINGS,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_GENERAL_SETTINGS . '_update',
                'group' => self::GROUP_GENERAL_SETTINGS,
                'menu_group' => self::MENU_GROUP_SETTINGS,
            ],

            // Email Settings
            [
                'name' => 'Email Settings View',
                'slug' => self::GROUP_EMAIL_SETTINGS . '_show',
                'group' => self::GROUP_EMAIL_SETTINGS,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Email Settings Update',
                'slug' => self::GROUP_EMAIL_SETTINGS . '_update',
                'group' => self::GROUP_EMAIL_SETTINGS,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],

            // Email Signature
            [
                'name' => 'Email Signature List',
                'slug' => self::GROUP_EMAIL_SIGNATURE . '_index',
                'group' => self::GROUP_EMAIL_SIGNATURE,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Email Signature Create',
                'slug' => self::GROUP_EMAIL_SIGNATURE . '_create',
                'group' => self::GROUP_EMAIL_SIGNATURE,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Email Signature View',
                'slug' => self::GROUP_EMAIL_SIGNATURE . '_show',
                'group' => self::GROUP_EMAIL_SIGNATURE,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Email Signature Update',
                'slug' => self::GROUP_EMAIL_SIGNATURE . '_update',
                'group' => self::GROUP_EMAIL_SIGNATURE,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Email Signature Delete',
                'slug' => self::GROUP_EMAIL_SIGNATURE . '_delete',
                'group' => self::GROUP_EMAIL_SIGNATURE,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],

            // Social Link
            [
                'name' => 'Social Link View',
                'slug' => self::GROUP_SOCIAL_LINK . '_show',
                'group' => self::GROUP_SOCIAL_LINK,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Social Link Update',
                'slug' => self::GROUP_SOCIAL_LINK . '_update',
                'group' => self::GROUP_SOCIAL_LINK,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            
            // Email Template
            [
                'name' => 'Email Template List',
                'slug' => self::GROUP_EMAIL_TEMPLATE . '_index',
                'group' => self::GROUP_EMAIL_TEMPLATE,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Email Template Update',
                'slug' => self::GROUP_EMAIL_TEMPLATE . '_update',
                'group' => self::GROUP_EMAIL_TEMPLATE,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],

            // Holiday
            [
                'name'  => 'List',
                'slug'  => self::GROUP_HOLIDAY . '_index',
                'group' => self::GROUP_HOLIDAY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS
            ],
            [
                'name'  => 'Create',
                'slug'  => self::GROUP_HOLIDAY . '_create',
                'group' => self::GROUP_HOLIDAY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS
            ],
            [
                'name'  => 'Update',
                'slug'  => self::GROUP_HOLIDAY . '_update',
                'group' => self::GROUP_HOLIDAY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS
            ],
            [
                'name'  => 'Delete',
                'slug'  => self::GROUP_HOLIDAY . '_delete',
                'group' => self::GROUP_HOLIDAY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS
            ],
            [
                'name'  => 'Resize',
                'slug'  => self::GROUP_HOLIDAY . '_resize',
                'group' => self::GROUP_HOLIDAY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS
            ],

            // Territory
            [
                'name' => 'List',
                'slug' => self::GROUP_TERRITORY . '_index',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_TERRITORY . '_create',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_TERRITORY . '_update',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Show',
                'slug' => self::GROUP_TERRITORY . '_show',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Details',
                'slug' => self::GROUP_TERRITORY . '_details',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_TERRITORY . '_delete',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Status Update',
                'slug' => self::GROUP_TERRITORY . '_status',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'List of Vans',
                'slug' => self::GROUP_TERRITORY . '_list_of_vans',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'List of Drivers',
                'slug' => self::GROUP_TERRITORY . '_list_of_drivers',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'List of Dogs',
                'slug' => self::GROUP_TERRITORY . '_list_of_dogs',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'List of Customers',
                'slug' => self::GROUP_TERRITORY . '_list_of_customers',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'List of Bookings',
                'slug' => self::GROUP_TERRITORY . '_list_of_bookings',
                'group' => self::GROUP_TERRITORY,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],

            // Product
            [
                'name' => 'List',
                'slug' => self::GROUP_PRODUCT . '_index',
                'group' => self::GROUP_PRODUCT,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_PRODUCT . '_create',
                'group' => self::GROUP_PRODUCT,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_PRODUCT . '_update',
                'group' => self::GROUP_PRODUCT,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Show',
                'slug' => self::GROUP_PRODUCT . '_show',
                'group' => self::GROUP_PRODUCT,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_PRODUCT . '_delete',
                'group' => self::GROUP_PRODUCT,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],

            // Session
            [
                'name' => 'List',
                'slug' => self::GROUP_SESSION . '_index',
                'group' => self::GROUP_SESSION,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Create',
                'slug' => self::GROUP_SESSION . '_create',
                'group' => self::GROUP_SESSION,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_SESSION . '_update',
                'group' => self::GROUP_SESSION,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Show',
                'slug' => self::GROUP_SESSION . '_show',
                'group' => self::GROUP_SESSION,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Change Status',
                'slug' => self::GROUP_SESSION . '_status',
                'group' => self::GROUP_SESSION,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],
            [
                'name' => 'Delete',
                'slug' => self::GROUP_SESSION . '_delete',
                'group' => self::GROUP_SESSION,
                'menu_group' => self::MENU_GROUP_MORE_SETTINGS,
            ],

            // Report
            [
                'name' => 'Booking Report',
                'slug' => self::GROUP_REPORT . '_booking',
                'group' => self::GROUP_REPORT,
                'menu_group' => self::MENU_GROUP_REPORT,
            ],
            [
                'name' => 'Purchase Report',
                'slug' => self::GROUP_REPORT . '_purchase',
                'group' => self::GROUP_REPORT,
                'menu_group' => self::MENU_GROUP_REPORT,
            ],

            // Foot print
            [
                'name' => 'Login List',
                'slug' => self::GROUP_LOG . '_login_index',
                'group' => self::GROUP_LOG,
                'menu_group' => self::MENU_GROUP_FOOT_PRINT,
            ],
            [
                'name' => 'Login Delete',
                'slug' => self::GROUP_LOG . '_delete_login',
                'group' => self::GROUP_LOG,
                'menu_group' => self::MENU_GROUP_FOOT_PRINT,
            ],
            [
                'name' => 'Activity List',
                'slug' => self::GROUP_LOG . '_activity_index',
                'group' => self::GROUP_LOG,
                'menu_group' => self::MENU_GROUP_FOOT_PRINT,
            ],
            [
                'name' => 'Activity View',
                'slug' => self::GROUP_LOG . '_activity_show',
                'group' => self::GROUP_LOG,
                'menu_group' => self::MENU_GROUP_FOOT_PRINT,
            ],
            [
                'name' => 'Email List',
                'slug' => self::GROUP_LOG . '_email_index',
                'group' => self::GROUP_LOG,
                'menu_group' => self::MENU_GROUP_FOOT_PRINT,
            ],
            [
                'name' => 'Email View',
                'slug' => self::GROUP_LOG . '_email_show',
                'group' => self::GROUP_LOG,
                'menu_group' => self::MENU_GROUP_FOOT_PRINT,
            ],

            // Ticket
            [
                'name'  => 'List',
                'slug'  => self::GROUP_TICKET . '_index',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,

            ],
            [
                'name'  => 'Create',
                'slug'  => self::GROUP_TICKET . '_create',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,

            ],
            [
                'name' => 'Update',
                'slug' => self::GROUP_TICKET . '_update',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,
            ],
            [
                'name'  => 'Show',
                'slug'  => self::GROUP_TICKET . '_show',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,

            ],
            [
                'name'  => 'Reply',
                'slug'  => self::GROUP_TICKET . '_reply',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,

            ],
            [
                'name'  => 'Assignee',
                'slug'  => self::GROUP_TICKET . '_assignee',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,

            ],
            [
                'name'  => 'Change Status',
                'slug'  => self::GROUP_TICKET . '_change_status',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,

            ],
            [
                'name'  => 'Re-Open',
                'slug'  => self::GROUP_TICKET . '_reopen',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,

            ],
            [
                'name'  => 'My Ticket Menu',
                'slug'  => self::GROUP_TICKET . '_my_ticket',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,

            ],
            [
                'name'  => 'All Ticket Menu',
                'slug'  => self::GROUP_TICKET . '_all_ticket',
                'group' => self::GROUP_TICKET,
                'menu_group' => self::MENU_GROUP_TICKET,

            ],
        ];
    }
}
