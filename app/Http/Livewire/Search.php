<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class Search extends Component
{
    public $search;

    public function render()
    {
        //recuperar con propiedades computadas

        return view('livewire.search');
    }

    //propiedade computadas

    public function getResultsProperty(){
        return Course::where('title','LIKE', '%'. $this->search .'%')
        ->where('status', 3)
        ->take(10)->get();
    }
}
