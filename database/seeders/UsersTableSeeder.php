<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => 'Admin',
            "last_name" => 'Admin',
            "email" => 'admin@admin.test',
            "password" => Hash::make('adminadmin')
        ]);
        DB::table('users')->insert([
            "name" => 'Bryan',
            "last_name" => 'Cranston',
            "email" => 'bryanc@test.com',
            "password" => Hash::make('secret')
        ]);
    }
}
