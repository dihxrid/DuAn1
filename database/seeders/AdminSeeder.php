<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_admin')->insert([
            'admin_email' => 'admin@example.com',
            'admin_password' => Hash::make('123456'), // Mật khẩu sẽ được hash
            'admin_name' => 'Admin',
            'admin_phone' => '1234567890',
        ]);
    }
}
