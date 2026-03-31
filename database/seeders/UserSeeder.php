<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@email.com',
                'phone_number' => null,
                'gender' => null,
                'date_of_birth' => null,
                'address' => null,
                'profile_photo' => 'default_profile_photo.png',
                'status' => 'Active',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role' => 'Super Admin',
                'branch_id' => null,
                'last_active' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'phone_number' => null,
                'gender' => null,
                'date_of_birth' => null,
                'address' => null,
                'profile_photo' => 'default_profile_photo.png',
                'status' => 'Active',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role' => 'Admin',
                'branch_id' => null,
                'last_active' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@email.com',
                'phone_number' => null,
                'gender' => null,
                'date_of_birth' => null,
                'address' => null,
                'profile_photo' => 'default_profile_photo.png',
                'status' => 'Active',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role' => 'Manager',
                'branch_id' => 1,
                'last_active' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Reporter',
                'email' => 'reporter@email.com',
                'phone_number' => null,
                'gender' => null,
                'date_of_birth' => null,
                'address' => null,
                'profile_photo' => 'default_profile_photo.png',
                'status' => 'Active',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role' => 'Reporter',
                'branch_id' => 1,
                'last_active' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'User 1',
                'email' => 'user1@email.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}