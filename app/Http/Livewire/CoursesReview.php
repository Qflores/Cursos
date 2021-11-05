<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Livewire\Component;

class CoursesReview extends Component
{
    public $course_id,$comment;

    public $rating = 5;

    public function mount(Course $course){
        $this->course_id = $course->id;
    }

    public function render()
    {
        $course = Course::find($this->course_id);

        return view('livewire.courses-review',compact('course'));
    }

    //agregado nueva reseña del curso
    public function store(){
        
        $course = Course::find($this->course_id);

        $this->validate([
            'comment'=>'required|min:20',
            'rating'=>'required'
        ]);

        $course->reviews()->create([
            'comment' => $this->comment,    //capturando el comentario del uaurios
            'rating' =>$this->rating,   //la calificacion 
            'user_id' => auth()->user()->id //quien esta haciendo el comentario

        ]);

    }

    



}
