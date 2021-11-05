<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100 my-2">
            <header>
                <h1 x-on:click="open=!open" class="cursor-pointer font-bold text-blue-600" title="Click para agregar la descripción"> <i class="fas fa-pen"></i> Descripcion de la Lession</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">
                @if($lesson->description)
                    <form wire:submit.prevent="update" class="bg-green-200 px-3 p-3">
                        <label for="" class="text-grey-500 tex-bold">Nombre</label>
                        
                        <textarea  wire:model="description.name" class="form-input w-full " name="" id="" cols="30" rows="2"></textarea>
                        @error('description.name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button class="btn btn-primary mr-2" type="submit"><i class="fas fa-save"></i> Actualizar</button>
                            <button wire:click="destroy" class="btn btn-danger">Eliminar</button>                            
                        </div>
                    </form>
                @else
                    <div class="bg-green-300 px-3 ">
                        <label for="">Nombre</label>
                        
                        <textarea wire:model="name" class="form-input w-full" name="" id="" cols="30" rows="2" placeholder="Agregue una descripcion de la lección "> </textarea>
                        @error('name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror

                        <div class=" flex justify-star mt-2">
                            <button wire:click="store" class="btn btn-primary ml-2"> <i class="far fa-save"></i> Guardar</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
