<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $courses = Student::all();

        return $this->createSuccessResponse($courses, 200);

    }


    public function show($id)
    {
        $course = Student::find($id);

        if ($course) {
            return $this->createSuccessResponse($course, 200);
        }

        return $this->createErrorResponse("The student with id {$id}, does not exist", 400);

    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'career' => 'required|in:engineering,math,physics'
        ];

        $this->validate($request, $rules);

        $student = Student::create($request->all());

        return $this->createSuccessResponse(
            "The student with id {$student->id} has been created", 200);

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