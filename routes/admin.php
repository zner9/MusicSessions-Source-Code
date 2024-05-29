<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('payments', [AdminController::class, 'payments'])->name('payments');

    Route::get('students', [AdminController::class, 'students'])->name('students');

    Route::get('teachers', [AdminController::class, 'teachers'])->name('teachers');

    Route::put('payments_update/{user}', [AdminController::class, 'update'])->name('payments.update');

    Route::delete('payments_update/{user}', [AdminController::class, 'delete'])->name('payments.delete');

});

