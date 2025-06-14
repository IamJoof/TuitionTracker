<?php

namespace App\Services;

use App\DataTransferObjects\StudentData;
use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\StudentRepositoryInterface;

class StudentService
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }


    /**
     * Retrieves a list of students, with optional filters.
     * 
     * @param array $filters
     * 
     * @return Collection
     */
    public function getStudents(array $filters= [], int $perPage = 15): LengthAwarePaginator
    {
        $query = Students::query();

        foreach ($filters as $column => $value) {
            $query->where($column, $value);
        }

        return $query->paginate($perPage);
    }

    public function createStudent(StudentData $data): Students
    {
        return $this->studentRepository->create($data);
    }
    

    public function findStudentById(int $id): ?Students
    {
        return $this->studentRepository->findById($id);
    }

    public function updateStudentInformation(Students $students, array $data): Students
    {
        return $this->studentRepository->update($students, $data);
    }

    public function deleteStudentRecords(Students $student): bool
    {
        return $this->studentRepository->delete($student);
    }

    public function markStudentAsDiscounted (Students $students): Students
    {
        return $this->studentRepository->update($students, ['is_discounted' => true]);
    }

    public function markStudentAsNotDiscounted (Students $students): Students
    {
        return $this->studentRepository->update($students, ['is_discounted' => false]);
    }

public function getDiscountedStudentsList(): Collection
{
    try {
        return $this->studentRepository->getDiscounted();
    } catch (\Exception $e) {
        \Log::error('Error retrieving discounted students: ' . $e->getMessage());
        return collect();
    }
}


    public function calculateStudentAge (Students $student): int
    {
        return Carbon::parse($student->date_of_birth)->age;
    }
}