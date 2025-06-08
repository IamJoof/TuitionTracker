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
        
        Schema::create('student_ledger', function (Blueprint $table) {
            $table->id();

            $table->decimal('original_amount','10','2');

            $table->decimal('amount_paid','10','2');

            $table->decimal('balance','10','2');
            
            $table->decimal('discount_amount_applied','10','2')->default(0.00);

            $table->decimal('net_amount_due','10','2');

            $table->enum('status',['fully_paid','partially_paid','unpaid','overdue']);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_ledger');
    }
};
