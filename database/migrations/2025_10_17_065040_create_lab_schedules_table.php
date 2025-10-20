<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lab_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->foreignId('activity_id')->nullable()->constrained('activities')->onDelete('set null');
            $table->string('category')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('booked_by')->nullable();
            $table->enum('status', ['tersedia', 'dipakai'])->default('tersedia');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->unique(['room_id', 'date', 'start_time', 'end_time'], 'unique_room_schedule');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_schedules');
    }
};
