<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Review;
use App\Models\Section;
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
        // creando 20 cursos
        $courses = Course::factory(20)->create();

        foreach ($courses as $course) {

            //genrando 8 comentacio
            Review::factory(8)->create([
                'course_id'=>$course->id
            ]);
            //llenando la tabla Image
            Image::factory(1)->create([
                'imageable_id' => $course->id,
                'imageable_type' => 'App\Models\Course'
            ]);

            //Generando 4 requirimientos
            Requirement::factory(4)->create([
                'course_id' => $course->id
            ]);

            //generando  objetivos
            Goal::factory(7)->create([
                'course_id' => $course->id
            ]);

            //generando 4 audiencias
            Audience::factory(4)->create([
                'course_id' => $course->id
            ]);

            //creando 4 secciones
            $sections = Section::factory(4)->create(['course_id' => $course->id]);

            foreach ($sections as $section) {
                $lessons = Lesson::factory(4)->create(['section_id' => $section->id]);

                foreach ($lessons as $lesson) {
                    Description::factory(4)->create(['lesson_id' => $lesson->id]);
                }
            }
        }
    }
}
