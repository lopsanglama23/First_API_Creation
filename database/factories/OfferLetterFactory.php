<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfferLetter>
 */
class OfferLetterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['draft', 'sent', 'accepted', 'rejected', 'expired'];
        $positions = ['Software Developer', 'Senior Developer', 'Team Lead', 'Project Manager', 'QA Engineer'];

        return [
            'cv_id' => \App\Models\Cv::factory(),
            'position' => $this->faker->randomElement($positions),
            'salary' => $this->faker->randomFloat(2, 50000, 200000),
            'start_date' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
            'terms_and_conditions' => $this->faker->paragraphs(3, true),
            'draft_content' => $this->faker->optional()->paragraphs(5, true),
            'status' => $this->faker->randomElement($statuses),
            'sent_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'expires_at' => $this->faker->optional()->dateTimeBetween('+1 week', '+1 month'),
        ];
    }
}
