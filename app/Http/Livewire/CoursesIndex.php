<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
//componenete para paginancion
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use Withpagination;
    //parra filtrar por ategoria y levels
    public $category_id;
    public $level_id;

    public $search;

    public function render()
    {
        
        $categories = Category::all();
        $levels = Level::all();
        // cursos paginado en 8
        
        //querys cook se implementa en el modelo

        $courses = Course::where('title','like','%'.$this->search.'%')
        ->where('status','>=', 2)
        ->category($this->category_id)
        ->level($this->level_id)
        ->latest('id')
        ->paginate(9);

        return view('livewire.courses-index', compact("courses","levels","categories"));
    }

    //para listar todo los cursos
    //reseteamos los filtros category y level
    public function resetFilters(){
        $this->reset(['category_id','level_id']);
    }

    
    public function limpiar_page(){
        //reseteamos la pgina
        //$this->reset('page');
        $this->resetPage();
    }


}
