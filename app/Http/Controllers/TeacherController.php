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
        $this->validateRules($request);

        $teacher = Teacher::create($request->all());

        return $this->createSuccessResponse(
            "The teacher with id {$teacher->id} has been created", 200);
    }


    public function update(Request $request, $teacher_id)
    {
        $teacher = Teacher::find($teacher_id);

        if ($teacher) {
            $this->validateRequest($request);

            $teacher->name = $request->get('name');
            $teacher->phone = $request->get('phone');
            $teacher->address = $request->get('address');
            $teacher->profession = $request->get('profession');

            $teacher->save();

            return $this->createSuccessResponse(
                "The teacher with id {$teacher->id} has been updated", 200);
        }

        return $this->createErrorResponse(
            "The teacher with specified id does not exits", 404);
    }


    public function destroy($teacher_id)
    {
        $teacher = Teacher::find($teacher_id);

        if ($teacher) {
            $courses = $teacher->courses;

            if (sizeof($courses)) {
                return $this->createErrorResponse(
                    "You cant remove a teacher with active courses. Please remove those courses", 409);
            }

            $teacher->delete();
        }

        return $this->createErrorResponse(
            "The teacher with the specified id does not exist", 404);
    }


    function validateRequest($request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'profession' => 'required|in:engineering,math,physics'
        ];

        $this->validate($request, $rules);
    }

}