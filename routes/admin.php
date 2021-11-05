<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\LevelController;

use App\Http\Controllers\Admin\PriceController;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver Dashboard')->name("home");

Route::resource('roles', RoleController::class)->names('roles');
//solo crear las rutas en array only(['index','edit','update'])->
Route::resource('users', UserController::class)->names('users');

//controlado para la categoria
Route::resource('categories', CategoryController::class)->names('categories');

//cotrolador para administrar niveles
Route::resource('levels', LevelController::class)->names('levels');
Route::resource('prices', PriceController::class)->names('prices');

//ruta para aprobar o desproabr cursos en el cms
Route::get('courses', [CourseController::class,'index'])->name('courses.index');

//rutapara aprobar o deaprobar un curso
Route::get('courses/{course}', [CourseController::class,'show'])->name('courses.show');
Route::post('courses/{course}/approved', [CourseController::class,'approved'])->name('courses.approved');

//falta completar para enviar correo al profesor



