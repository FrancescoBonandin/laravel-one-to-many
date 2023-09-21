<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models

use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        for($i=0;$i<20;$i++){

            $title=fake()->words(rand(1,5),true);


            Project::create([

                'title'=>$title,
                'slug'=>str()->slug($title),
                'description'=>fake()->paragraph(2),
            ]);
        };
    }
}
