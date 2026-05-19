<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [StudentController::class, 'index']);
Route::post('/add-student', [StudentController::class, 'store'])->name('add-student');
Route::post('/add-course', [StudentController::class, 'storeCourse'])->name('add-course');
