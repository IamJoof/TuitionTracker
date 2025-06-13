<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('students', function (Blueprint $table) {

            $table->id();

            $table->string('lrn_number')->unique()->nullable()->comment('Learner Referrence Number');

            $table->string('student_id_number')->unique()->comment('Student School Identification Number');

            $table->string('first_name');

            $table->string('middle_name')->nullable();

            $table->string('last_name');

            $table->string('suffix')->nullable();

            $table->date('date_of_birth');

            $table->enum('gender',['male','female']);

            $table->enum('year_level',['pre-elementary', 'elementary', 'junior_high', 'senior_high']);

            $table->string('status');

            $table->string('contact_number')->nullable();

            $table->boolean('is_discounted')->default(false);

            $table->text('address')->nullable();

            //Foreign Keys and Indexes
            $table->foreignId('created_by_user_id')->nullable()->constrained('users')->onDelete('set null');

            $table->foreignId('current_academic_year_id')->nullable()->constrained('academic_years')->onDelete('set null');

            
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
