<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="img/home/favicon-cegicap.png" type="image/x-icon">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <div class="container py-8  grid grid-cols-5 gap-6" >
                <aside>                    
                    <h1 class="font-bold text-lg mb-4 ">Edición del curso</h1>
                                
                    <ul class="text-sm text-gray-600 mb-4">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-600 text-blue-500 font-bold @else border-transparent @endIf hover:text-blue-600 pl-2">
                            <a href="{{ route('instructor.courses.edit', $course) }}">Informacion del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-600 text-blue-500 font-bold @else border-transparent @endIf hover:text-blue-500  pl-2">
                            <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-600 text-blue-500 font-bold @else border-transparent @endIf hover:text-blue-500  pl-2">
                            <a href="{{ route('instructor.courses.goals', $course) }}">Meta del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-indigo-600 text-blue-500 font-bold @else border-transparent @endIf hover:text-blue-500  pl-2">
                            <a href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                        </li>                        
                        <li class="leading-7 mb-1 border-l-4 hover:text-blue-500 border-transparent pl-2">
                            <a href="{{ route('instructor.courses.index') }}">Mis Cursos</a>
                        </li>
                    </ul>
                    
                    @switch($course->status)
                        @case(1)
                            <form action="{{ route('instructor.courses.status', $course) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary">Solicitar Revicion</button>
                            </form>
                            @break

                        @case(2)
                            <div class="card bg-gray-300">
                                <div class="card-body">
                                    Este curso se encuentra en revisión
                                </div>                                
                            </div>
                            @break

                        @case(3)
                            <div class="card bg-gray-300">
                                <div class="card-body">
                                    Este curso se enceuntra publicado
                                </div>                                
                            </div>
                            @break                         
                    @endswitch               
                    
                </aside>
        
                <div class="col-span-4 card">
                    <main class="card-body text-gray-600">
                        {{ $slot }}
                    </main>
                </div>
            </div>
            <!-- endPage Content -->
            
        </div>

        @stack('modals')

        @livewireScripts
        
        @isset($js)
            {{ $js }}
        @endisset
        
    </body>
</html>
