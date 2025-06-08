<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'ViewStudents'])->name('ViewStudents');

//Create Student
Route::post('/createStudent', [StudentController::class, 'createStudent'])->name('createStudent');
//Update Student
Route::put('updateStudent/{id}', [StudentController::class, 'updateStudent'])->name('updateStudent');
//Delete Student
Route::delete('deleteStudent/{id}', [StudentController::class, 'deleteStudent'])->name('deleteStudent');