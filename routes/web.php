<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [StudentController::class, 'index']);
Route::post('/add-student', [StudentController::class, 'store'])->name('add-student');
Route::post('/add-course', [StudentController::class, 'storeCourse'])->name('add-course');
Route::put('/edit-student/{id}', [StudentController::class, 'updateStudent'])->name('edit-student');
Route::put('/edit-course/{id}', [StudentController::class, 'updateCourse'])->name('edit-course');
