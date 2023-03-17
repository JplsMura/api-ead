<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory(5)
            ->has(
                Module::factory()->has(
                    Lesson::factory()->count(5)
                )->count(3)
        )->create();
    }
}
