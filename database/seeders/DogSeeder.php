<?php

namespace Database\Seeders;

use App\Models\Dog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        $dogs = [
            [
                'name'=>'bunny',
                'breed'=>'Golden Retriver',
                'age'=>1,
                'gender'=>'female',
                'size'=>'small',
                'temperament'=>'friendly',
                'description'=>'Friendly and harmless dog',
                'image_path'=>null,
                'created_by'=>2,
                'status'=>"available",
            ],

            [
                'name'=>'sunny',
                'breed'=>'Labortor Retriver',
                'age'=>4,
                'gender'=>'male',
                'size'=>'large',
                'temperament'=>'friendly',
                'description'=>'Friendly and harmless dog',
                'image_path'=>null,
                'created_by'=>2,
                'status'=>"available",
            ],

            [
                'name'=>'oeeee!',
                'breed'=>'Labortor Retriver',
                'age'=>2,
                'gender'=>'male',
                'size'=>'large',
                'temperament'=>'friendly',
                'description'=>'Friendly and harmless dog',
                'image_path'=>null,
                'created_by'=>2,
                'status'=>"available",
            ]

         ];
        foreach ($dogs as $key => $dog) {
            Dog::create($dog);
        }
    }
}
