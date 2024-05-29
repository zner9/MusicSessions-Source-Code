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
        Schema::create('student_schedule2s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->string('th1')->default('close');
            $table->string('th2')->default('close');
            $table->string('th3')->default('close');
            $table->string('th4')->default('close');
            $table->string('th5')->default('close');
            $table->string('th6')->default('close');
            $table->string('th7')->default('close');
            $table->string('th8')->default('close');
            $table->string('th9')->default('close');
            $table->string('th10')->default('close');
            $table->string('th11')->default('close');
            $table->string('th12')->default('close');

            $table->string('f1')->default('close');
            $table->string('f2')->default('close');
            $table->string('f3')->default('close');
            $table->string('f4')->default('close');
            $table->string('f5')->default('close');
            $table->string('f6')->default('close');
            $table->string('f7')->default('close');
            $table->string('f8')->default('close');
            $table->string('f9')->default('close');
            $table->string('f10')->default('close');
            $table->string('f11')->default('close');
            $table->string('f12')->default('close');

            $table->string('s1')->default('close');
            $table->string('s2')->default('close');
            $table->string('s3')->default('close');
            $table->string('s4')->default('close');
            $table->string('s5')->default('close');
            $table->string('s6')->default('close');
            $table->string('s7')->default('close');
            $table->string('s8')->default('close');
            $table->string('s9')->default('close');
            $table->string('s10')->default('close');
            $table->string('s11')->default('close');
            $table->string('s12')->default('close');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_schedules2');
    }
};
