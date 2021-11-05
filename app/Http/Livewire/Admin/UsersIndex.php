<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;

class UsersIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;

    //resetear la pginacion d en la busqueda de usuairos, esta enla clase Withpagination
    //public $page = 1;

    public function render()
    {
        $users = User::where('name','like','%'.$this->search.'%')
        ->orWhere('email','like','%'.$this->search.'%')
        ->paginate(5);

        return view('livewire.admin.users-index',compact('users'));
    }

    public function limpiar_page(){
        //reseteamos la pgina
        //$this->reset('page');
        $this->resetPage();
    }
}
