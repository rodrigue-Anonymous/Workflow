<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
    
class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'type' => $this->faker->randomElement(['task_assigned', 'project_completed']),
            'message' => $this->faker->sentence,
            'is_read' => $this->faker->boolean(50),
        ];
    }
}
