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
        Schema::create('student_discounts_applieds', function (Blueprint $table) {
            $table->id();

            $table->decimal('amount_applied','10','2');

            $table->text('notes')->nullable();

            $table->timestamps();

            //Foreign Keys

            $table->foreignId('discount_id')->constrained('discounts')->onDelete('cascade');

            $table->foreignId('student_ledger_id')->constrained('student_ledger')->onDelete('cascade');

            $table->foreignId('applied_by_user_id')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_discounts_applieds');
    }
};
