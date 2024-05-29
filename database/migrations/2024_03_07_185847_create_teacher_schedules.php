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
        Schema::create('teacher_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->string('instrument')->default('');
            $table->string('m1')->default('closed');
            $table->string('m2')->default('closed');
            $table->string('m3')->default('closed');
            $table->string('m4')->default('closed');
            $table->string('m5')->default('closed');
            $table->string('m6')->default('closed');
            $table->string('m7')->default('closed');
            $table->string('m8')->default('closed');
            $table->string('m9')->default('closed');
            $table->string('m10')->default('closed');
            $table->string('m11')->default('closed');
            $table->string('m12')->default('closed');

            $table->string('t1')->default('closed');
            $table->string('t2')->default('closed');
            $table->string('t3')->default('closed');
            $table->string('t4')->default('closed');
            $table->string('t5')->default('closed');
            $table->string('t6')->default('closed');
            $table->string('t7')->default('closed');
            $table->string('t8')->default('closed');
            $table->string('t9')->default('closed');
            $table->string('t10')->default('closed');
            $table->string('t11')->default('closed');
            $table->string('t12')->default('closed');

            $table->string('w1')->default('closed');
            $table->string('w2')->default('closed');
            $table->string('w3')->default('closed');
            $table->string('w4')->default('closed');
            $table->string('w5')->default('closed');
            $table->string('w6')->default('closed');
            $table->string('w7')->default('closed');
            $table->string('w8')->default('closed');
            $table->string('w9')->default('closed');
            $table->string('w10')->default('closed');
            $table->string('w11')->default('closed');
            $table->string('w12')->default('closed');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_schedules');
    }
};
