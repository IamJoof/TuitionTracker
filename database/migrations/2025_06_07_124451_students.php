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

            $table->string('lrn_number')->unique()->nullable()->comment(`Learner's Reference Number`);

            $table->string('student_id_number')->unique()->comment(`Student's School Id Number`);

            $table->string('first_name');

            $table->string('middle_name')->nullable();

            $table->string('last_name');

            $table->date('date_of_birth');

            $table->string('gender');

            $table->string('year_level');

            $table->string('status');

            $table->boolean('is_discounted')->default(false);

            $table->date('date_of_birth');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
