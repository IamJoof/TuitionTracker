<?php 

namespace App\Repositories\Contracts;

use App\DataTransferObjects\StudentData;
use App\Models\Students;
use Illuminate\Support\Collection;

interface StudentRepositoryInterface
{

    public function create(StudentData $studentData): Students;
    
    public function all(array $filters= []): Collection;

    public function findById(int $id) : ?Students;

    public function findByStudentIdNumber (string $student_id_number): ?Students;


    public function findByLearnerReferenceNumber (string $lrn_number): ?Students;


    public function update (Students $student, array $data): Students;


    public function delete (Students $student): bool;



    public function getDiscounted(): Collection;
}


