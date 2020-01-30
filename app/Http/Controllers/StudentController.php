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
        $this->validateRequest($request);

        $student = Student::create($request->all());

        return $this->createSuccessResponse(
            "The student with id {$student->id} has been created", 200);

    }


    public function update(Request $request, $student_id)
    {
        $student = Student::find($student_id);

        if ($student) {
            $this->validateRequest($request);

            $student->name = $request->get('name');
            $student->phone = $request->get('phone');
            $student->address = $request->get('address');
            $student->career = $request->get('career');

            $student->save();

            return $this->createSuccessResponse(
                "The student with id {$student->id} has been updated", 200);
        }

        return $this->createErrorResponse(
            "The student with specified id does not exits", 404);


    }


    public function destroy()
    {
        return __METHOD__;
    }


    function validateRequest($request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'career' => 'required|in:engineering,math,physics'
        ];

        $this->validate($request, $rules);
    }


}