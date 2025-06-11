<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Students;
use App\Services\StudentService;

class StudentController extends Controller
{
    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function store (StoreStudentRequest $request): Students {

        $student = $this->studentService->createStudent($request->validated());

        return response()->json(new StudentResource($student))
            ->additional([
                'message' => 'Student created successfully'
            ],201);
    }

    public function showAge (Students $student) {

        $age = $this->studentService->calculateStudentAge($student);

        return response()->json([
            'student' => new StudentResource($student),
            'age' => $age
        ], 201);
    }
}
