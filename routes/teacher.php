<?php

use App\Http\Controllers\Teacher\GeneralController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'teacher/', 'as' => 'teacher.', 'middleware' => ['auth']], function () {

    Route::get('dashboard', [GeneralController::class, 'index'])->name('dashboard');

    Route::get('schedules', [GeneralController::class, 'schedules'])->name('schedules');

    Route::get('schedules_edit', [GeneralController::class, 'editSchedule'])->name('schedules.edit');

    Route::put('schedules_update', [GeneralController::class, 'update'])->name('schedules.update');

    Route::get('students', [GeneralController::class, 'students'])->name('students');

    Route::get('profile', [GeneralController::class, 'profile'])->name('profile');

    Route::get('profile_edit', [GeneralController::class, 'edit_profile'])->name('profile.edit');

    Route::post('profile_update', [GeneralController::class, 'update_profile'])->name('profile.update');

    Route::put('profile_update{user}', [GeneralController::class, 'update_profile'])->name('profile.update');

    Route::get('attendance', [GeneralController::class, 'attendance'])->name('attendance');

    Route::get('attendance/create/{student}', [GeneralController::class, 'attendanceShow'])->name('attendance.show');

    Route::post('attendance/store', [GeneralController::class, 'attendanceUpdate'])->name('attendance.store');

});


