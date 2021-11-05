<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CetificateController;
use Illuminate\Support\Facades\Route;
//imort controller with one method
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Livewire\CourseStatus;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [CourseController::class,'index'])->name('courses.index');

Route::get('cursos/{course}',[CourseController::class,'show'])->name("courses.show");

//matricular al usuairo
Route::post('course/{course}/enrolled',[CourseController::class,'enrolled'])->middleware('auth')->name('courses.enrolled');

//llevar curso/ para ver la lista de lecciones de un curso suscrito
Route::get('course-status/{course}', CourseStatus::class)->name("courses.status")->middleware('auth');


Route::get('newinstructor', [InstructorController::class,'instructor'])->name("newinstructor");
Route::post('newinstructor', [InstructorController::class,'register'])->name("newinstructor.register");

Route::get('certificado/{course}', [CetificateController::class,'Addtopdf'])->middleware('auth')->name('certificado');

Route::get('blogs', [BlogController::class,'index'])->name('blogs');

