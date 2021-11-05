<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;


Route::redirect('', 'instructor/courses');

//esta ruta nos lleva a la vista crear cursos
Route::resource('courses', CourseController::class)->names('courses');

//este controlado controla un livewire
Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Editar cursos')->name('courses.curriculum');

///meta del curso
Route::get('courses/{course}/goals', [CourseController::class,'goals'])->name('courses.goals');
//estudiantes del curso
Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:Editar cursos')->name('courses.students');
//
Route::post('courses/{course}/status', [CourseController::class,'status'])->name('courses.status');

