<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Image as ModelsImage;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course_id, $course, $current, $file, $comment, $rating = 5;
    //para ubicarnose en la lession reproducida

    public function mount(Course $course){

        $this->course = $course;
        $this->course_id = $course->id;

        foreach($course->lessons as $lesson){
            if(!$lesson->completed){
                $this->current = $lesson;

                //Indice
                //tema actual
                //$this->index = $course->lessons->search($lesson); //devuelve el indice
                //$this->previous = $course->lessons[$this->index-1];
                //$this->next = $course->lessons[$this->index+1];
                break; //se queda en la ultima lession completado
            }
        }
        if(!$this->current){
            $this->current = $course->lessons->last();
        }
        //accion no authorizada
        $this->Authorize('enrolled',$course);

        $this->file = storage_path('app/public/'. 'certi/UNDAC_CERT.pdf');
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
        $this->index = $this->course->lessons->pluck('id')->search($lesson->id); 

    }

    //para agregar lecciones llevados
    public function completed(){
        if($this->current->completed){
            //eliminar leccion completada
            $this->current->users()->detach(auth()->user()->id);

        }else{
            //agregar leccion como culminada
            $this->current->users()->attach(auth()->user()->id);
        }

        $this->current = Lesson::find( $this->current->id);
        $this->course = Course::find( $this->course->id);

    }

    // propiedad computada
    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id); 
    }

    public function getPreviousProperty(){
        if($this->index == 0){
            return  null;
        }else{
            return $this->course->lessons[$this->index-1];
        }
    }

    public function getNextProperty(){
        if($this->index == $this->course->lessons->count()-1){
            return null;
        }else{
            return$this->course->lessons[$this->index+1];
        }
        
    }

    public function getAdvanceProperty(){
        //cuantas lecciones marco como culminado
        $i = 0;
        foreach($this->course->lessons as $lesson){
            if($lesson->completed){
                $i++;
            }
        }

        $avance = ($i * 100)/($this->course->lessons->count());
        //retorna on dos decimales
        return round($avance,2);  
        
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


    public function download(){
        //descargamos el documento
        return response()->download(storage_path('app/public/'. $this->current->resource->url ));
    }

    public function downloadcerti($course){
        
        //$course = $course['slug'];
        //return dd($course['slug']);
       // return redirect()->route('certificado',compact('course'));

        //return response()->download(storage_path('app/public/certi/UNDAC_CERT.pdf'));
    }



}
