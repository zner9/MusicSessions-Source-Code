<?php

use App\Http\Controllers\HeaderController;
use App\Models\StudentInstrument;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', function () {
    $user = Auth::user();
    $users = User::all();
    $instruments = StudentInstrument::all();
    return view('students.dashboard', compact('user', 'users', 'instruments'));
})->name('auth.dashboard');

Route::group(['prefix' => 'view/', 'as' => 'student.'], function () {

    Route::get('about_MusicSessions', [HeaderController::class, 'about_MusicSessions'])->name('about_MusicSessions');

    Route::get('rates', [HeaderController::class, 'rates'])->name('rates');

    Route::get('instruments', [HeaderController::class, 'instruments'])->name('instruments');

    Route::post('instruments', [HeaderController::class, 'create'])->name('instruments.create')->middleware(['auth']);

    Route::get('teachers', [HeaderController::class, 'teachers'])->name('teachers')->middleware(['auth']);

    Route::post('teachers', [HeaderController::class, 'teachers_create'])->name('teachers.create')->middleware(['auth']);

    Route::get('teachers_schedules', [HeaderController::class, 'schedules'])->name('schedules')->middleware(['auth']);

    Route::post('teachers_schedules', [HeaderController::class, 'schedules_create'])->name('schedules.create')->middleware(['auth']);

    Route::get('students_payments', [HeaderController::class, 'payments'])->name('students_payments')->middleware(['auth']);

    Route::post('students_payments', [HeaderController::class, 'payments_create'])->name('students_payments.create')->middleware(['auth']);

    Route::get('instrument_final', [HeaderController::class, 'instrument_final'])->name('instrument_final')->middleware(['auth']);

    Route::get('profile', [HeaderController::class, 'profile'])->name('profile')->middleware(['auth']);

    Route::get('profile_edit', [HeaderController::class, 'edit_profile'])->name('profile.edit')->middleware(['auth']);

    Route::post('profile_update', [HeaderController::class, 'update_profile'])->name('profile.update')->middleware(['auth']);

    Route::get('profile_schedules', [HeaderController::class, 'profile_schedules'])->name('profile_schedules')->middleware(['auth']);

    Route::get('attendance', [HeaderController::class, 'attendance'])->name('attendance')->middleware(['auth']);

    Route::get('attendance_show', [HeaderController::class, 'attendanceShow'])->name('attendance.show')->middleware(['auth']);

    Route::post('attendance_update', [HeaderController::class, 'attendanceUpdate'])->name('attendance.update')->middleware(['auth']);

    Route::get('pay_again', [HeaderController::class, 'pay_again'])->name('pay_again')->middleware(['auth']);

    Route::post('pay_again_create', [HeaderController::class, 'pay_againCreate'])->name('pay_again.create')->middleware(['auth']);

});



