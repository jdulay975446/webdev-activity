<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\AuthCheck;
use App\Http\Controllers\AuthController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware([AuthCheck::class])->group(function () {
Route::get('/', [StudentController::class, 'ViewStudents'])->name('dashboard');
//Create Student
Route::post('/createStudent', [StudentController::class, 'createStudent'])->name('createStudent');
//Update Student
Route::put('updateStudent/{id}', [StudentController::class, 'updateStudent'])->name('updateStudent');
//Delete Student
Route::delete('deleteStudent/{id}', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
});