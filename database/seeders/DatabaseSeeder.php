<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(EntityTableSeeder::class);
        $this->call(EntityJobTableSeeder::class);
        $this->call(WorkerTableSeeder::class);
        $this->call(EntityWorkerTableSeeder::class);
    }
}
