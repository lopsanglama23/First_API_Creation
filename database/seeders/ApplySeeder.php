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
                    'user_id'=>1,
                    'dog_id'=>2,
                    'application_date'=>null,
                    'status'=>"Pending",
                    'notes'=>null,
                    'full_name'=>'Hansi flick',
                    'email'=>'lopsang100@gmail.com',
                    'phone'=>'9878439089',
                    'address'=>'lalitpur',
                    'housing_type'=>'apartment',
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
