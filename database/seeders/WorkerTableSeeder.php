<?php

namespace Database\Seeders;

use App\Models\Worker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WorkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->insert([
            'name' => 'Admin',
            'last_name' => "Admin",
            'dni' => '00000000000',
            'date_birth' => '2001-01-01',
            'address' => 'Admin address',
            'user_id' => 1,
        ]);
        DB::table('workers')->insert([
            'name' => 'Bryan',
            'last_name' => "Cranston",
            'dni' => '12345678901',
            'date_birth' => '2001-01-01',
            'address' => '206 Schultz Flats Suite 442 East Kadenhaven, VT 12850-8129',
            'user_id' => 2,
        ]);
    }
}
