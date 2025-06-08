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
        Schema::create('payment_allocations', function (Blueprint $table) {
            $table->id();

            $table->decimal('amount_allocated','10','2');

            $table->timestamps();

            //Foreign Keys

            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade');

            $table->foreignId('fee_id')->constrained('student_fees')->onDelete('cascade');
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
