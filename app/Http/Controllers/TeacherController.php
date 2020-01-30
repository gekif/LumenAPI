<?php

namespace App\Http\Controllers;

use App\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $courses = Teacher::all();

        return $this->createSuccessReponse($courses, 200);

    }


    public function show($id)
    {
        $course = Teacher::find($id);

        if ($course) {
            return $this->createSuccessReponse($course, 200);
        }

        return $this->createErrorMessage("The teacher with id {$id}, does not exist", 400);

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