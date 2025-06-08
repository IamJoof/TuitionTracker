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
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();

            $table->enum('category', ['tuition','books','others']);

            $table->decimal('amount','10','2');

            $table->timestamps();

            // Foreign Ids here and indexes
            $table->foreignId('fee_id')->constrained('student_ledger')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fees');
    }
};
