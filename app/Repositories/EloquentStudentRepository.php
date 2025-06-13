<?php

namespace App\Repositories;

use App\DataTransferObjects\StudentData;
use App\Models\Students;
use App\Repositories\Contracts\StudentRepositoryInterface;
use Illuminate\Support\Collection;

class EloquentStudentRepository implements StudentRepositoryInterface
{
    public function create(StudentData $studentData): Students
    {
        return Students::create((array) $studentData);
    }

    public function all(array $filters= []): Collection
    {
        return Students::when($filters, function ($query) use ($filters) {
            foreach ($filters as $filter => $value) {
                $query->where($filter, $value);
            }
        })->get();
    }

    public function findById(int $id) : ?Students
    {
        return Students::where('id', $id)->first('*');
    }

    public function findByLearnerReferenceNumber(string $lrn_number): ?Students
    {
        return Students::where('lrn_number', $lrn_number)->first($lrn_number);
    }

    public function update (Students $students, array $data): Students
    {
        $students->update($data);
        return $students;
    }

    public function delete (Students $student): bool
    {
        return $student->delete();
    }

    public function findByStudentIdNumber(string $student_id_number): ?Students
    {
        return Students::where('student_id_number', $student_id_number)->first($student_id_number);
    }

    public function getDiscounted(): Collection
    {
        return Students::where('status', 'discounted')->get();
    }
}