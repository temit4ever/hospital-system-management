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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->date('date')->index();
            $table->time('start_time')->index();
            $table->time('end_time')->index();
            $table->text('reason');
            $table->text('diagnose')->nullable(); // Show only to doctors/nurses
            $table->text('prescription')->nullable(); // Show only to doctors/nurses
            $table->enum('status', ['attended', 'absent', 'awaiting'])->default('awaiting')->index();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
