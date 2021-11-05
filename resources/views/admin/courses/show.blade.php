<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1  lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}"  alt="" >
                @else
                    <img class="h-full w-full object-cover" src="{{ asset('img/home/default-cover.jpg') }}" alt="">
                @endif
                
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>

                <p class="mb-2"> <i class="fas fa-chart-line"></i> Nivel: {{$course->level->name}} </p>
                <p class="mb-2"> <i class="fas fa-bell"></i> Categoría: {{$course->category->name}}</p>
                <p class="mb-2"> <i class="fas fa-users"></i> Matriculados: {{$course->students_count }}</p>
                <p> <i class="far fa-star"></i> Calificacion: {{$course->rating }} </p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="bg-red-100  border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Ocurrio  un error!</strong>
                    <span class="block sm:inline">{{ session('info') }}</span>
                    <span class="absolute top-0 right-0 px-4 py-3">
                        <svg  x-on:click="open = false" class="fill-current h-6 w-6 text-red-700" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </span>
                </div>
            </div>
        @endif
        
        <div class="order-2 lg:col-span-2 lg:order-1">
            {{-- Metas --}}
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">¿QUÉ APRENDERÁS DE ESTE CURSO?</h1>
                    <ul clas="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ( $course->goals as $goal)
                            <li class="text-gray-700 text-base"> <i class="fas fa-check text-gray-600 mr-2"></i> {{$goal->name}} </li>
                        @empty
                            <li class="text-red-700 text-base"> <i class="fas fa-window-close text-red-600 mr-2"></i> Este curso no tiene metas asignados </li>
                        @endforelse
                                                
                    </ul>   
                </div>
            </section>
            {{-- Temario --}}
            <section>
                <h1 class="font-fold text-3xl mb-2">Temario</h1>
                
                @forelse($course->sections as $section)
                    <article class="mb-4 shadow"
                        @if($loop->first)
                            x-data="{open: true}"
                        @else
                            x-data="{open: false}"
                        @endif
                    >
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200 flex transition duration-500 hover:bg-green-600 transform" x-on:click="open= !open">
                            <h1 class="font-bold text-gray-600 hover:text-gray-100">
                                {{$loop->index+1}}. {{ $section->name }} 
                            </h1>
                            <div class="text-gray-400 ml-auto">
                                <i class="fas fa-chevron-circle-down"></i>
                            </div>
                        </header>
                        <div class="bg-white py-2 px-4 transition-all duration-500 " x-show="open">
                            <ul class="grid grid-cols-1 gap-2 ">
                                @foreach($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base hover:bg-green-200"><i class="fas fa-play-circle mr-2 text-gray-600"></i> {{$lesson->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @empty
                    <article class="card">
                        <div class="card-body">Este curso no tiene ninguna sección asignado</div>
                    </article>

                @endforelse
            </section>
            {{-- Requisitos --}}
            <section class="mb-1 ml-5">
                <h1 class="font-bold text-3xl">Requisitos</h1>

                <ul class="list-disc list-inside">
                    @forelse($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @empty
                         <li class="text-gray-700 text-base">Eset curso no tiene ningun requirimiento</li>
                    @endforelse
                </ul>
            </section>

            <section class="card mb-1">
                <div class="card-body">
                    <h1 class="font-bold text-3xl">Descripción</h1>
                    <div class="text-gray-700 ">
                        {!! $course->description !!}
                    </div>
                </div>
                
                
            </section>

        </div>

        <!-- contenido de la derecha-->

        <div class="order-1 lg:order-2">
            <section class="card mb-5">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg " src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-500 text-lg">  Profesor: {{ $course->teacher->name  }} </h1>
                            <a class="text-blue-400 text-sm font-bold " href="" class="">{{'@'.Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.courses.approved', $course) }}" class="mt-4" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Aprobar Curso</button>
                    </form>
                    
                   
                </div>
            </section>
            
        </div>
        
    </div>
</x-app-layout>