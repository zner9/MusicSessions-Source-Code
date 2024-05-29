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
        Schema::create('teacher_schedule2s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->string('th1')->default('closed');
            $table->string('th2')->default('closed');
            $table->string('th3')->default('closed');
            $table->string('th4')->default('closed');
            $table->string('th5')->default('closed');
            $table->string('th6')->default('closed');
            $table->string('th7')->default('closed');
            $table->string('th8')->default('closed');
            $table->string('th9')->default('closed');
            $table->string('th10')->default('closed');
            $table->string('th11')->default('closed');
            $table->string('th12')->default('closed');

            $table->string('f1')->default('closed');
            $table->string('f2')->default('closed');
            $table->string('f3')->default('closed');
            $table->string('f4')->default('closed');
            $table->string('f5')->default('closed');
            $table->string('f6')->default('closed');
            $table->string('f7')->default('closed');
            $table->string('f8')->default('closed');
            $table->string('f9')->default('closed');
            $table->string('f10')->default('closed');
            $table->string('f11')->default('closed');
            $table->string('f12')->default('closed');

            $table->string('s1')->default('closed');
            $table->string('s2')->default('closed');
            $table->string('s3')->default('closed');
            $table->string('s4')->default('closed');
            $table->string('s5')->default('closed');
            $table->string('s6')->default('closed');
            $table->string('s7')->default('closed');
            $table->string('s8')->default('closed');
            $table->string('s9')->default('closed');
            $table->string('s10')->default('closed');
            $table->string('s11')->default('closed');
            $table->string('s12')->default('closed');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_schedules2');
    }
};
