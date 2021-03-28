<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle,
            'importance' => $this->faker->numberBetween(1, 10),
            'is_boss' => $this->faker->randomElement(array (0, 1)),
            'category_id' => $this->faker->randomElement(array (1, 2)),
        ];
    }

}
