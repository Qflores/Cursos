<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('status','3')->latest('id')->get()->take(20);

        //return view("courses.index",compact('courses'));
        return view('welcome', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //solo mostramos los cursos con status 3
        // llamando la clase Policies/CoursePolicy/
        $this->authorize('published', $course);
        //$courses = Course::find($course);
        $similares  = Course::where('category_id',$course->category_id)
        ->where('id', '!=', $course->id) // distinto a este id
        ->where('status',3)
        ->latest("id")
        ->take(5) // solo mostrar 5 cursos
        ->get();

        return view("courses.show", compact("course","similares"));
        //return redirect()->route('curso');
    }

    public function enrolled(Course $course){
        $course->students()->attach(auth()->user()->id);
        return redirect()->route("courses.status", $course);
    }


    /*public function status(Course $course){
        return view("courses.status", compact("course"));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
