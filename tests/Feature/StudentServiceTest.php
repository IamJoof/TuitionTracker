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

    public function test_can_update_student()
    {
        $student = Students::factory()->create([
            'first_name' => 'John',
        ]);

        $previous_value = $student->first_name;
        
        $updated_student_information = $this->studentService->updateStudentInformation($student, [
            'first_name' => 'Joof',
        ]);
        
        $this->assertEquals('Joof', $updated_student_information->first_name);

        fwrite(STDOUT, "Student update test passed. \n 
        This is the previous first_name: {$previous_value} \n 
        This is the updated first_name: {$updated_student_information->first_name} \n");
    }

    public function test_can_get_students()
    {
        $faker = \Faker\Factory::create();

        
        for($i = 0; $i < 5; $i++){
            Students::factory()->create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
            ]);
        }

        fwrite(STDOUT, "\n *********************** \n This is the number of students: " . count($this->studentService->getStudents()) . "\n");
        
        $this->assertEquals(5, count($this->studentService->getStudents())); 
    }

    public function test_can_find_student_by_id()
    {
        $student = Students::factory()->create();

        

        $this->assertEquals($student->id, $this->studentService->findStudentById($student->id)->id);
    }
}
