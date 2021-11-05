<div>
    @foreach ($section->lessons as $item)
        <article class="card mt-4 " x-data="{open: false}">
            <div class="card-body">

                @if($lesson->id == $item->id)                    
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Nombre: </label>
                            <input wire:model="lesson.name" type="text" class="form-input w-full">
                        </div>
                        @error('lesson.name')
                            <span class="text-sm text-red-600">{{ $message}}</span>
                        @enderror
                        
                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma: </label>
                            <select wire:model="lesson.platform_id" class="w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">URL: </label>
                            <input wire:model="lesson.url" type="text" class="form-input w-full">
                        </div>
                        @error('lesson.url')
                            <span class="text-sm text-red-600">{{ $message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-between">
                            <button type="submit" class="btn btn-primary" ><i class="fa fa-save text-gray-100"></i> Actualizar</button>
                            <button type="button" class="btn btn-danger" wire:click="cancel"><i class="fas fa-window-close  text-gray-100"></i> Cancelar</button>
                        </div>

                    </form>
                @else
                    <header>
                        <h1 x-on:click="open=!open" class="cursor-pointer"> <i class="far fa-play-circle text-blue-500 mr-2"></i> Lección: {{ $item->name }}</h1>
                    </header>
                    
                    <div x-show="open">
                        <hr class="my-2 bg-green-600">
                        <p class="text-sm"> Plataforma: {{ $item->platform->name }}</p>
                        <p class="text-sm"> Enlace: <a class="text-blue-600" href="{{ $item->url}}" target="_blank"> {{ $item->url}} </a></p>
                    

                        <div class="my-2 justify-between">
                            <button class="btn btn-primary text-sm" wire:click="edit({{ $item }})"><i class="fa fa-edit"></i> Editar</button>  
                            <button class="btn btn-danger text-sm" wire:click="destroy({{ $item }})"><i class="fas fa-trash"></i> Eliminar</button>  
                        </div>

                        <div class="mb-4">
                            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-' . $item->id))
                        </div>
                    
                        <div>
                            @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources' . $item->id))
                        </div>
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{ open: false }"  class="mt-4">
        <a x-show="!open" x-on:click="open= !open" class="flex items-center cursor-pointer text-blue-600 pt-4">
            <i class="far fa-plus-square text-2xl text-green-500 mr-2"></i>
            Agregar Nueva Lección
        </a>

        <article class="card" x-show="open">            
            <div class="card-body bg-blue-200">
                <h1 class="text-xl font-bold mb-4">Agregar Nueva Lección</h1>
                
                <div class="mb-4">
                    <div class="flex items-center">
                        <label class="w-32">Nombre: </label>
                        <input wire:model="name" type="text" class="form-input w-full">
                    </div>
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message}}</span>
                    @enderror
                    
                    <div class="flex items-center mt-4">
                        <label  class="w-32">Plataforma: </label>
                        <select wire:model="platform_id" class="w-full py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                            @foreach($platforms as $platform)
                                <option value="{{$platform->id}}">{{ $platform->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('platform_id')
                        <span class="text-sm text-red-600">{{ $message}}</span>
                    @enderror
                    

                    <div class="flex items-center mt-4">
                        <label class="w-32">URL: </label>
                        <input wire:model="url" type="text" class="form-input w-full">
                    </div>
                    @error('url')
                        <span class="text-sm text-red-600">{{ $message}}</span>
                    @enderror
                    
                </div>
                <div class="flex mt-4 justify-star">
                    <button class="btn btn-primary mr-2" wire:click="store"><i class="far fa-save"></i> Guardar</button>
                    <button class="btn btn-danger ml-2" x-on:click="open = false">Cancelar</button>                        
                </div>                
            </div>
        </article>
        
    </div>
</div>
