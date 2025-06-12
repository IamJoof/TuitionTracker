<?php

namespace Tests\Feature;

use App\DataTransferObjects\StudentData;
use App\Models\Students;
use App\Services\StudentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentServiceTest extends TestCase
{
    use RefreshDatabase;

    protected StudentService $studentService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->studentService = app(StudentService::class);
    }

    public function test_can_create_student()
    {
        $data = new StudentData(
            lrn_number: '1234567890',
            student_id_number: 'STU123',
            first_name: 'John',
            middle_name: 'A.',
            last_name: 'Doe',
            suffix: null,
            date_of_birth: '2010-01-01',
            gender: 'male',
            year_level: 'junior_high',
            status: 'active',
            contact_number: '09123456789',
            is_discounted: false,
            address: '123 Street',
            created_by_user_id: null,
            current_academic_year_id: null
        );

        $student = $this->studentService->createStudent($data);

        $this->assertDatabaseHas('students', [
            'student_id_number' => 'STU123',
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
    }

    public function test_can_calculate_student_age()
    {
        $student = Students::factory()->create([
            'date_of_birth' => now()->subYears(15)->toDateString(),
        ]);

        $age = $this->studentService->calculateStudentAge($student);

        $this->assertEquals(15, $age);
    }
}
