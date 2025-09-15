<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assessment>
 */
class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['behavioral', 'technical', 'aptitude', 'other'];
        $statuses = ['pending', 'completed', 'evaluated'];

        return [
            'cv_id' => \App\Models\Cv::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->optional()->paragraph(),
            'type' => $this->faker->randomElement($types),
            'score' => $this->faker->optional()->numberBetween(0, 100),
            'max_score' => $this->faker->optional()->numberBetween(50, 100),
            'remarks' => $this->faker->optional()->paragraph(),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
