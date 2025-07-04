<?php

namespace Database\Seeders;

use App\Models\Role;
use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'username' => 'admin_user',
                'phone' => '1234567890',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'agent User',
                'username' => 'agent_user',
                'phone' => '1234567890',
                'role' => 'agent',
                'email' => 'agent@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Regular User',
                'username' => 'regular_user',
                'phone' => '1234567891',
                'role' => 'user',
                'email' => 'user@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],

            [
                'name' => 'Mahfuzul Islam',
                'username' => 'mahfuzul1125',
                'phone' => '1234567893',
                'role' => 'admin',
                'email' => 'mahfuzul1125@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
