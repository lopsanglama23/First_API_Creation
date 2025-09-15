<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cv>
 */
class CvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $technologies = ['Dot Net', 'React JS', 'DevOps', 'QA', 'PHP', 'Python', 'Java', 'Angular'];
        $levels = ['Junior', 'Mid', 'Senior'];
        $statuses = ['shortlisted', 'first_interview_complete', 'second_interview_complete', 'hired', 'rejected', 'blacklisted'];

        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'references' => $this->faker->optional()->paragraph(),
            'technology' => $this->faker->randomElement($technologies),
            'level' => $this->faker->randomElement($levels),
            'salary_expectation' => $this->faker->optional()->randomFloat(2, 30000, 150000),
            'experience_years' => $this->faker->numberBetween(0, 15),
            'status' => $this->faker->randomElement($statuses),
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}
