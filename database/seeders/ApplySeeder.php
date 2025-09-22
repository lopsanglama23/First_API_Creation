<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apply = [
                [
                    'user_id',
                    'dog_id',
                    'application_date',
                    'status',
                    'notes',
                    'full_name',
                    'email',
                    'phone',
                    'address',
                    'housing_type',
                    'has_yard',
                    'has_children',
                    'has_other_pets',
                    'work_schedule',
                    'previous_experience',
                    'adoption_reason'
                ],
                [
                    'user_id',
                    'dog_id',
                    'application_date',
                    'status',
                    'notes',
                    'full_name',
                    'email',
                    'phone',
                    'address',
                    'housing_type',
                    'has_yard',
                    'has_children',
                    'has_other_pets',
                    'work_schedule',
                    'previous_experience',
                    'adoption_reason'
                ]
            ];
    }
}
