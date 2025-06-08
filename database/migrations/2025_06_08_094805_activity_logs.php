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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();

            $table->string('action_type');

            $table->text('description');

            $table->morphs('loggable');

            $table->json('details_before')->nullable();

            $table->json('details_after')->nullable();

            $table->ipAddress()->nullable();

            $table->text('user_agent')->nullable();

            $table->timestamps();
            
            //Foreign Keys
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
