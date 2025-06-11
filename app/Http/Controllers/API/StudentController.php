<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
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

        return response()->json([
            'message'       =>      'Student created successfully',
            'data stored: ' => $student
        ], 201);
    }
}
