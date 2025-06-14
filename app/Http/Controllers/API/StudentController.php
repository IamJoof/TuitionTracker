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
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

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

    public function index() {

        \DB::beginTransaction();

        try{
            $students = \DB::table('students')->get();
        } catch(\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }

        if ($students->isEmpty()) {
            return response()->json([
                'message' => 'There are no students records in the database.'
            ]);
        }

        return response()->json([
            'students' => $students
        ]);
    }

    public function indexForPagination (Request $request): JsonResponse|StudentCollection {
        $filters = $request->only([
                    'gender',
                    'year_level',
                    'status',
                    'is_discounted'
                    ]);
        
        $perPage = $request->input('per_page', 15);

        $students = $this->studentService->getStudents($filters,$perPage);

        if(empty($students)){
            return response()->json([
                'message' => 'No students found.'
            ])->setStatusCode(404);
        }

        return new StudentCollection($students);
    }

    public function delete ($id){

       $student = $this->studentService->findStudentById($id);

        if(!$student){
            return response()->json([
                'message' => 
                'This student does not exist in our records.'
            ])->setStatusCode(404);
        }
        

        $this->studentService->deleteStudentRecords($student);

        return response()->json([
            'message' => "Successfully deleted {$student->full_name} from our records."
        ])->setStatusCode(200);
    }


    public function update(Request $request, $id) {
        $student = $this->studentService->findStudentById($id);

        
        if(!$student){
            return response()->json([
                'message' => 
                'This student does not exist in our records.'
            ])->setStatusCode(404);
        }

        $updatedStudentRecords = $this->studentService->updateStudentInformation($student, $request->all());

        return new StudentResource($updatedStudentRecords);
    }

    public function show($id) {
        try {
            $student = $this->studentService->findStudentById((int)$id);

            if ($student === null) {
                return response()->json([
                    'student'      => $student,
                    'message' => 'This student does not exist in our records.'
                ], 404);
            }

            return new StudentResource($student);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving the student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getDiscountedStudents () {
        return $this->studentService->getDiscountedStudentsList();
    }
}
