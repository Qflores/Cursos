<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //administra solo unica ruta
    //metodo __invoke
    public function __invoke()
    {

        //status 1 = borrador
        //status 2 = 
        //status 3 = publicados
        //metodo latest('campo')->get() recupera los registros de forma descendente
        //retornamos 10 cursos


        $courses = Course::where('status','3')->latest('id')->get()->take(10);
        //return dd($courses);
        //return view('welcome', compact('courses'));

        //$courses = Course::where('status','3')->latest('id')->get()->take(1);

        return view("courses.index",compact('courses'));

    }
}
