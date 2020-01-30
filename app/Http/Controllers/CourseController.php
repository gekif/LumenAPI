<?php

namespace App\Http\Controllers;

use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return $this->createSuccessReponse($courses, 200);

    }


    public function show($id)
    {
        $course = Course::find($id);

        if ($course) {
            return $this->createSuccessReponse($course, 200);
        }

        return $this->createErrorMessage("The course with id {$id}, does not exist", 400);

    }


}