<?php

namespace App\Http\Controllers\API;

use App\DataTransferObjects\StudentData;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Students;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function store (StoreStudentRequest $request): StudentResource  {

        $dto = StudentData::fromArray($request->validated());

        $student = $this->studentService->createStudent($dto);

        return new StudentResource($student);
    }

    public function showAge (Students $student) {

        $age = $this->studentService->calculateStudentAge($student);

        return response()->json([
            'student' => new StudentResource($student),
            'age' => $age
        ], 201);
    }

    public function index (Request $request): StudentCollection {
        $filters = $request->only([
                    'gender',
                    'year_level',
                    'status',
                    'is_discounted'
                    ]);
        
        $perPage = $request->input('per_page', 15);

        $students = $this->studentService->getStudents($filters,$perPage);

        return new StudentCollection($students);
    }
}
