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
        Schema::create('student_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->string('m1')->default('close');
            $table->string('m2')->default('close');
            $table->string('m3')->default('close');
            $table->string('m4')->default('close');
            $table->string('m5')->default('close');
            $table->string('m6')->default('close');
            $table->string('m7')->default('close');
            $table->string('m8')->default('close');
            $table->string('m9')->default('close');
            $table->string('m10')->default('close');
            $table->string('m11')->default('close');
            $table->string('m12')->default('close');

            $table->string('t1')->default('close');
            $table->string('t2')->default('close');
            $table->string('t3')->default('close');
            $table->string('t4')->default('close');
            $table->string('t5')->default('close');
            $table->string('t6')->default('close');
            $table->string('t7')->default('close');
            $table->string('t8')->default('close');
            $table->string('t9')->default('close');
            $table->string('t10')->default('close');
            $table->string('t11')->default('close');
            $table->string('t12')->default('close');

            $table->string('w1')->default('close');
            $table->string('w2')->default('close');
            $table->string('w3')->default('close');
            $table->string('w4')->default('close');
            $table->string('w5')->default('close');
            $table->string('w6')->default('close');
            $table->string('w7')->default('close');
            $table->string('w8')->default('close');
            $table->string('w9')->default('close');
            $table->string('w10')->default('close');
            $table->string('w11')->default('close');
            $table->string('w12')->default('close');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_schedules');
    }
};
