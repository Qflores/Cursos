<div class="mt-8 ">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>

            <h1 class="text-3xl test-gray-600 font-bold mt-4">
                {{$current->name}}
            </h1>    
            <!-- {{ $current }}-->
            @if($current->description)
                <div class="">
                    {{$current->description->name}}
                </div>
            @endif

            <div class="flex justify-between mt-4 ">
                {{-- marcar como culminado --}}

                <div class="flex items-center cursor-pointer" wire:click="completed">
                    
                    @if($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-red-600"></i>

                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600"></i>

                    @endif
                    <p class="text-sm ml-2">Marcar Como Culminada</p>
                </div>

                @if ($current->resource)
                    <div class="flex items-center text-green-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-2xl "></i>
                        <p class="text-sm ml-2"> Descargar Recurso</p>
                    </div>
                @endif

            </div>

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 fond-white">
                    @if($this->previous)
                        <a wire:click="changeLesson({{$this->previous}})" class="btn btn-primary cursor-pointer"><i class="fas fa-angle-left"></i> Tema Anterior</a>
                    @endif

                    @if($this->next)
                        <a wire:click="changeLesson({{$this->next}})"  class="btn btn-primary ml-auto  cursor-pointer">Siguiente Tema <i class="fas fa-angle-right"></i></a>
                    @endif                    
                </div>
            </div>
            
            @if ($this->advance >= 100)
                <article class="shadown-lg mb-4 mt-5">

                    @can('valued',$course)  

                    <div class="overflow-hidden leading-normal rounded-lg mb-15 m-5" role="alert">
                        <p class="px-4 py-3 font-bold text-blue-100 bg-green-800">AL FINALIZAR EL CURSO OBTENDRÁ SU CERTIFICACIÓN </p>
                        <p  wire:click="downloadcerti({{$course}})" class="px-4 py-3 text-blue-700 bg-purple-100 cursor-pointer">
                            Por favor deja tu comentario, para Nosotros es muy importante para mejorar en nuestras enseñanzas
                        </p>
                    </div>
                    
                    <span wire:loading class="bg-green-600 text-white">Validando Comentario...</span>
                    <textarea wire:model.lazy="comment" class="form-input w-full"rows="3" placeholder="Ingrese una reseña del curso"></textarea>
                    @error('comment')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                    <div class="flex">
                        
                        
                        <ul class="flex items-center ml-5">
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                                <i class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray'}}-300">
            
                                </i>
                            </li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                                <i class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray'}}-300">
            
                                </i>
                            </li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                                <i class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray'}}-300">
            
                                </i>
                            </li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                                <i class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray'}}-300">
            
                                </i>
                            </li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                                <i class="fas fa-star text-{{ $rating >= 5 ? 'yellow' : 'gray'}}-300">
            
                                </i>
                            </li>
                        </ul>
        
                        <div wire:click="store" class="w-10 h-10 ml-3 cursor-pointer  items-center rounded-full  ">
                            
                            <i class="text-red-500 ml-2  fab fa-gratipay fa-2x" title="Guardar comentario"></i> Calificar
                        </div>
                    </div>
                    @else
                        {{-- <div class="font-bold px-4 py-3 leading-normal text-black bg-red-300 rounded-lg mb-5" role="alert">
                            <p>Usted ya valoró este curso</p>
                        </div> --}}
                        <div class="card mt-2 mb-15">
                            <div class="card-body flex text-gray-800 fond-white">
                                <h1 class="text-sm font-bolt">FELICITACIONES, A CULMINADO EL CURSO </h1>
                                
                            </div>
                            <div class="overflow-hidden leading-normal rounded-lg mb-15 m-5" role="alert">
                                <p class="px-4 py-3 font-bold text-blue-100 bg-green-800 mb-8">TU CERTIFICADO YA ESTA DISPOBLE </p>
                                
                                <a class="mt-5 px-4 py-3 text-blue-700 bg-purple-100 cursor-pointer" href="{{route('certificado', $course)}}" target="_blank" rel="noopener noreferrer">
                                    Descargar Certificado<i class="ml-2 fas fa-download text-2xl"></i>
                                </a>
                            </div>
                        </div>
                    @endcan
        
                </article>

                
            @else
                <div class="card mt-2 mb-10">
                    <div class="card-body flex text-gray-500 fond-white">
                        <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                            <p class="font-bold"> TU AVANCE ES: {{  $this->advance}}% </p>
                            <h1 class="text-sm font-bolt">PARA OBTENER EL CERTIFICADO DEL CURSO DEBE CULMINAR LAS LECCIONES</h1>
                          </div>
                    </div>
                </div>
            @endif
            
        </div>
        <div class="card mb-15">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4"> {{ $course->title }}</h1>
                
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>
                    <div class="">
                        <p>{{ $course->teacher->name}}</p>
                        <a href="" class="text-blue-500 text-sm">{{'@'. Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>  
                
                <!-- barra de progreso-->
                <p class="text-gray-600 text-sm mt-2"> {{$this->advance.'%'}} Completado</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-red-200">
                        <div style="width:{{$this->advance.'%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500 transition-all duration-500"></div>
                    </div>
                </div>
                    
                <ul class="">
                    @foreach($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2 text-gray-600">{{$loop->index+1}}. {{ $section->name }}</a>
                            <ul>
                                @foreach($section->lessons as $lesson)
                                    <li class="flex ">
                                        <a wire:click="changeLesson({{$lesson}})" class="  mb-2 pl-4 cursor-pointer">
                                        <div class="">

                                            @if($lesson->completed)
                                                @if($current->id ==$lesson->id )
                                                
                                                    @if($this->advance < 100)
                                                        <i class="inline-block w-4 h-4 bg-red-100 border-2 border-red-600 rounded-full mr-2 mt-1"></i> <span class="text-red-500">{{ $loop->index+1}}. {{ $lesson->name }}</span>
                                                    @elseif($this->advance == 100)
                                                        <i class="inline-block w-4 h-4 bg-yellow-100 border-2 border-yellow-600 rounded-full mr-2 mt-1"></i> <span class="text-gray-700">{{ $loop->index+1}}. {{ $lesson->name }}</span>
                                                    @else
                                                        <i class="inline-block w-4 h-4 bg-gray-400 border-2 border-gray-800 rounded-full mr-2 mt-1"></i> <span class="text-gray-500">{{ $loop->index+1}}. {{ $lesson->name }}</span>
                                                    @endif

                                                @else
                                                    <i class="inline-block w-4 h-4 bg-yellow-100 border-2 border-yellow-300 rounded-full mr-2 mt-1"></i><span class="text-gray-800"> {{ $loop->index+1}}. {{ $lesson->name }}</span>
                                                @endif
                                            @else
                                                @if($current->id ==$lesson->id )
                                                    <i class="inline-block w-4 h-4 bg-blue-200  border-2 border-blue-600 rounded-full mr-2 mt-1"></i> <span class="text-blue-600"> {{ $loop->index+1}}. {{ $lesson->name }}</span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-400 border-2 border-gray-800 rounded-full mr-2 mt-1"> </span> {{ $loop->index+1}}. {{ $lesson->name }} 
                                                    
                                                @endif
                                                
                                            @endif

                                        </div>

                                        
                                        
                                            
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
</div>
