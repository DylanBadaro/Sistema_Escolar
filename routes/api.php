<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CourseStudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Rutas para estudiantes (students)
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('students/download-pdf', [StudentController::class, 'downloadPDF'])->name('students.downloadPDF');


// Rutas para materias (subjects)
Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
Route::get('/subjects/search', [SubjectController::class, 'searchSubject'])->name('subjects.search');
Route::get('subjects/download-pdf', [SubjectController::class, 'downloadPdf'])->name('subjects.downloadPdf');



// Rutas para cursos (courses)
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::get('/courses/download', [CourseController::class, 'downloadList'])->name('courses.downloadList');


// Rutas para comisiones (commissions)
Route::get('/commissions', [CommissionController::class, 'index'])->name('commissions.index');
Route::get('/commissions/create', [CommissionController::class, 'create'])->name('commissions.create');
Route::post('/commissions', [CommissionController::class, 'store'])->name('commissions.store');
Route::get('/commissions/{commission}/edit', [CommissionController::class, 'edit'])->name('commissions.edit');
Route::put('/commissions/{commission}', [CommissionController::class, 'update'])->name('commissions.update');
Route::delete('/commissions/{commission}', [CommissionController::class, 'destroy'])->name('commissions.destroy');
Route::get('/commissions/download', [CommissionController::class, 'downloadList'])->name('commissions.downloadList');

// Rutas para profesores (professors)
Route::get('/professors', [ProfessorController::class, 'index'])->name('professors.index');
Route::get('/professors/create', [ProfessorController::class, 'create'])->name('professors.create');
Route::post('/professors', [ProfessorController::class, 'store'])->name('professors.store');
Route::get('/professors/{professor}/edit', [ProfessorController::class, 'edit'])->name('professors.edit');
Route::put('/professors/{professor}', [ProfessorController::class, 'update'])->name('professors.update');
Route::delete('/professors/{professor}', [ProfessorController::class, 'destroy'])->name('professors.destroy');
Route::get('/professors/download', [ProfessorController::class, 'downloadList'])->name('professors.downloadList');


// Rutas para estudiantes de cursos (course_students)
Route::get('/course_students', [CourseStudentController::class, 'index'])->name('course_students.index');
Route::get('/course_students/create', [CourseStudentController::class, 'create'])->name('course_students.create');
Route::post('/course_students', [CourseStudentController::class, 'store'])->name('course_students.store');
Route::get('/course_students/{course_student}/edit', [CourseStudentController::class, 'edit'])->name('course_students.edit');
Route::put('/course_students/{course_student}', [CourseStudentController::class, 'update'])->name('course_students.update');
Route::delete('/course_students/{course_student}', [CourseStudentController::class, 'destroy'])->name('course_students.destroy');
Route::get('course_students/pdf', [CourseStudentController::class, 'downloadPDF'])->name('course_students.downloadPDF');

