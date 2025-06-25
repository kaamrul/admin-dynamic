<?php

namespace Database\Seeders\SystemData;

use App\Models\User;
use App\Library\Enum;
use App\Library\Helper;
use App\Models\Territory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
    }

    private function createAdmin()
    {
        $user = new User();
        $user->first_name = "System";
        $user->last_name = "Admin";
        $user->username = "system-admin";
        $user->email = config('app.admin_email');
        $user->password = bcrypt(config('app.admin_password'));
        $user->user_type = Enum::USER_TYPE_SUPER_ADMIN;
        $user->status = 'active';
        $user->phone = '01800000000';
        $user->operator_id = 1;
        $user->email_verified_at = now();
        $user->save();
    }
}
