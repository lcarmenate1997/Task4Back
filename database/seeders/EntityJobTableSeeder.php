<?php

namespace Database\Seeders;

use App\Models\Entity;
use App\Models\Job;
use Illuminate\Database\Seeder;

class EntityJobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entity = Entity::all();

        Job::all()->each(function ($job) use ($entity) {
            $job->entities()->attach(
                $entity->random(rand(1, 10))->pluck('id')->toArray()
            );
        });
    }
}
