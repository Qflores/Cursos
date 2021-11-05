<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class BlogIndex extends Component
{
    public $search;

    public function render()
    {
        $blogs = Blog::where('title','like','%'.$this->search.'%')->paginate(10);
        
        return view('livewire.blog-index',compact('blogs'));
    }

    public function limpiar_page(){
        //reseteamos la pgina
        //$this->reset('page');
        $this->resetPage();
    }
}
