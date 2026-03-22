<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Person;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['open', 'completed']),
            'taskable_id' =>  fake()->boolean(50) ? Business::inRandomOrder()->value('id') : Person::inRandomOrder()->value('id'),
            'taskable_type' =>  fake()->randomElement(['App\Models\Business', 'App\Models\Person']),
        ];
    }
}
