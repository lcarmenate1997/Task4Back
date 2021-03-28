<?php

namespace Database\Seeders;

use App\Models\Entity;
use App\Models\Worker;
use Illuminate\Database\Seeder;

class EntityWorkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entity = Entity::all();

        Worker::all()->each(function ($worker) use ($entity) {
            $worker->entities()->attach(
                $entity->random(rand(1, 10))->pluck('id')->toArray()
            );
        });
    }
}
