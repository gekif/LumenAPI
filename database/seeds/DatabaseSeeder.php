<?php

use App\Course;
use App\Student;
use App\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For MySQL
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // For PostgreSQL
        DB::statement('SET session_replication_role = replica');

        // For MySQL
//        Teacher::truncate();
//        Student::truncate();
//        Course::truncate();
//        DB::table('course_student')->truncate();

        // For PostgreSQL
        DB::statement('TRUNCATE TABLE teachers CASCADE');
        DB::statement('TRUNCATE TABLE students CASCADE');
        DB::statement('TRUNCATE TABLE courses CASCADE');
        DB::statement('TRUNCATE TABLE course_student CASCADE');

        factory(Teacher::class, 50)->create();
        factory(Student::class, 500)->create();

        factory(Course::class, 40)->create()->each(function ($course) {
            $course->students()->attach(array_rand(range(1, 500), 40));
        });


        $this->call('OAuthClientSeeder');

    }
}
