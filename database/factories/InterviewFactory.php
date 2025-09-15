<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interview>
 */
class InterviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['first_interview', 'second_interview', 'final_interview', 'hr_interview'];
        $statuses = ['scheduled', 'completed', 'cancelled', 'rescheduled'];

        return [
            'cv_id' => \App\Models\Cv::factory(),
            'interviewer_id' => \App\Models\User::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->optional()->paragraph(),
            'type' => $this->faker->randomElement($types),
            'scheduled_at' => $this->faker->dateTimeBetween('now', '+1 month'),
            'completed_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'status' => $this->faker->randomElement($statuses),
            'feedback' => $this->faker->optional()->paragraph(),
            'rating' => $this->faker->optional()->numberBetween(1, 5),
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}
