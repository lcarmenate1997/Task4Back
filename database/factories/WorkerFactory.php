<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class WorkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filepath = storage_path('avatars');
        return [
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'dni' => $this->faker->numerify('###########'),
            'date_birth' => $this->faker->date(),
            'address' => $this->faker->address(),
            'user_id' => 2,
        ];
    }
}
