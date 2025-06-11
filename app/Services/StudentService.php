<?php

namespace App\Services;

use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\StudentRepositoryInterface;

class StudentService
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }


    public function getStudents(array $filters= []): Collection
    {
        return $this->studentRepository->all($filters);
    }

    public function createStudent(array $data): Students
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
        return $this->studentRepository->getDiscounted();
    }

    public function calculateStudentAge (Students $student): int
    {
        return Carbon::parse($student->date_of_birth)->age;
    }
}