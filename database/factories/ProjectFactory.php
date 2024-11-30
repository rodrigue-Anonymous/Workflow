<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Associe à un utilisateur existant
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'deadline' => $this->faker->dateTimeBetween('+1 week', '+6 months'),
            'status' => $this->faker->randomElement(['ongoing', 'completed']),
        ];
    }
}
