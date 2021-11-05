<div>
    <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">
   
    @foreach($course->sections as $item)
        <article class="card mb-6 " x-data="{open: true}">
            <article class="card-body bg-gray-200">
                @if($section->id == $item->id)

                    <form wire:submit.prevent="update">
                        <input  class="form-input w-full" type="text" placeholder="Ingrese El nombre de la sección" wire:model="section.name">
                        @error('section.name')
                            <span class="text-xs text-red-500"> {{ $message }}</span>
                        @enderror                       

                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer  w-full p-2 rounded-sm"> <strong> Sección {{ $loop->index+1 }} : </strong>{{ $item->name }}</h1>
                        <div>
                            <i class="fa fa-edit cursor-pointer text-blue-500" wire:click="edit({{ $item}}) "></i>
                            <i class="fa fa-eraser cursor-pointer text-red-500" wire:click="destroy({{ $item}}) "></i>
                        </div>
                    </header>

                    <div x-show="open">
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>

                @endif
                
            </article>
        </article>        
    @endforeach

    <div x-data="{ open: false }" >
        <a x-show="!open" x-on:click="open= !open" class="flex items-center cursor-pointer text-blue-500 pt-4">
            <i class="far fa-plus-square text-2xl text-green-500 mr-2"></i>
            Agregar Nueva Seccción
        </a>

        <article class="card" x-show="open">            
            <div class="card-body bg-green-200">
                <h1 class="text-xl font-bold mb-4">Agregar Nueva Sección</h1>
                <div class="mb-4">
                    <input wire:model="name" wire.enter="store" type="text" class="form-input w-full" placeholder="Escriba el Nombre de la Sección">
                    @error('name')
                        <strong class="text-sx text-red-600">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="flex mt-4 justify-star">
                    <button class="btn btn-primary mr-2" wire:click="store"><i class="fas fa-save"></i> Guardar</button>
                    <button class="btn btn-danger ml-2" x-on:click="open = false">Cancelar</button>                        
                </div>                
            </div>
        </article>
        
    </div>
    
</div>
