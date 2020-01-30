<?php

namespace App\Http\Controllers;

use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        $courses = Student::all();

        return $this->createSuccessReponse($courses, 200);

    }


    public function show($id)
    {
        $course = Student::find($id);

        if ($course) {
            return $this->createSuccessReponse($course, 200);
        }

        return $this->createErrorMessage("The student with id {$id}, does not exist", 400);

    }


    public function store()
    {
        return __METHOD__;
    }


    public function update()
    {
        return __METHOD__;
    }


    public function destroy()
    {
        return __METHOD__;
    }
}