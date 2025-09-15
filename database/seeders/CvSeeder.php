<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cv;
use App\Models\Assessment;
use App\Models\Interview;
use App\Models\OfferLetter;
use App\Models\User;

class CvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample users (interviewers)
        $interviewers = User::factory(3)->create();

        // Create sample CVs
        $cvs = Cv::factory(10)->create();

        // Create sample assessments for each CV
        foreach ($cvs as $cv) {
            Assessment::factory(2)->create([
                'cv_id' => $cv->id
            ]);
        }

        // Create sample interviews
        foreach ($cvs as $cv) {
            Interview::factory(1)->create([
                'cv_id' => $cv->id,
                'interviewer_id' => $interviewers->random()->id
            ]);
        }

        // Create sample offer letters for some CVs
        foreach ($cvs->take(3) as $cv) {
            OfferLetter::factory(1)->create([
                'cv_id' => $cv->id
            ]);
        }
    }
}
