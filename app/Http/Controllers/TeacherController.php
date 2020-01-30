<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $courses = Teacher::all();

        return $this->createSuccessResponse($courses, 200);

    }


    public function show($id)
    {
        $course = Teacher::find($id);

        if ($course) {
            return $this->createSuccessResponse($course, 200);
        }

        return $this->createErrorResponse("The teacher with id {$id}, does not exist", 400);

    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'profession' => 'required|in:engineering,math,physics'
        ];

        $this->validate($request, $rules);

        $teacher = Teacher::create($request->all());

        return $this->createSuccessResponse(
            "The teacher with id {$teacher->id} has been created", 200);

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