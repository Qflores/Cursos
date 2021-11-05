<div class="card" x-data="{open: false}">
    <div class="card-body bg-gray-100">
        <header >
            <h1 x-on:click="open=!open" class="text-lg font-bold text-blue-600 cursor-pointer"><i class="fas fa-toolbox text-blue-700"></i> Recursos de la lección</h1>
        </header>

        <div x-show="open">
            <hr class="my-2">

            @if ($lesson->resource)
                <h1 class="text-sm text-red-500 my-2 ml-2 font-bold"> Esta lección tiene un recurso</h1>
                <div class="flex justify-between items-center">
                    <p wire:click="download" class="text-blue-500 cursor-pointer"> <i  class="fas fa-download mr-2 text-lg"></i> Descargar Recurso</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-600 cursor-pointer" > Eliminar Recurso</i>
                </div>
            @else
                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input wire:model="file" type="file" class="form-input flex-1">
                        <button type="submit" class="btn btn-primary text-sm ml-2"><i class="far fa-save"></i> Guardar</button>
                    </div>

                    <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                        Cargando ...                  
                    </div>

                    @error('file')
                        <span class="text-sm text-red-500">{{ $message }}</span>                    
                    @enderror
                </form>
            @endif
        </div>
    </div>
</div>
