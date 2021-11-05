<x-app-layout>

    <!--- portada--->
    {{--<section class="bg-cover " style="background-image: url({{asset('img/home/foto1.jpg')}})">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">                
                <h1 class="text-shadow-black font-fold text-4xl">Contamos con los mejores Docentes</h1>
                <p class="text-shadow-black text-lg mb-4">Los cursos tienen manuales y artículos que te ayudarán a convertirte en un profesional especializado</p>
                @livewire("search")
            </div>
        </div>
        </section>
      --}}

    







    {{--  --}}
   
    <section class="mt-24">

        <h1 class="text-gray-600 text-center text-3xl mb-6">ESPECIALIDADES</h1>
        <!--
            sm:grid-cols-2 //divide en 2 columnas
            md:grid-cols-3 //divide en 3 columnas
            lg:grid-cols-4 //divide en 4 columnas
            gap-x-6 //da un espaciado en eje X de 1.5rem entre columnas
            gap-y-8 //da un espaciado en eje Y de 1.5rem entre columnas

        -->
        

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-10">
            <article>
                <figure>
                    <img class="rounded-xl h-38 w-full object-cover" src="{{asset('img/home/coffee-ga6cca4bbe_640.jpg')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">ADMINISTRACIÓN PÚBLICA</h1>
                </header>                
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-38 w-full object-cover" src="{{asset('img/home/dog-g077ea8c08_640.jpg')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">GESTIÓN DE LA SEGURIDAD Y SALUD</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-38 w-full object-cover" src="{{asset('img/home/flower-g0dea657a5_640.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">GESTIÓN FINANCIERA Y MARKETING</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-38 w-full object-cover" src="{{asset('img/home/kingfisher-ge7b6e7cb2_640.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">BIENESTAS SOCIAL Y NUTRICION</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

            </article>
        </div>

    </section>
    <!-- 
        Seccion medio de color gris
        mt-24       // magin-top: 24px
        text-3xl    // tamaño de texto 
        leading-6    //espacio entre las lineas en el texto
         Str::limit($course->title),40}}   //me retorna el titulo con 40
         //impotamos las estrellitas en la plantilla principas
         ///loyouts/app.blade.php

    -->
    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No sabes qué curso llevar?</h1>
        <p class="text-center text-xl text-white">Dirígete al catálogo de cursos y filtralos por categoría o nivel</p>
        
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catálogo de Cursos
            </a>
        </div>
    </section>
    <!-- lisat de cursos --->
    <section class="mt-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-4">Trabajo duro para seguir subiendo cursos</p>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            
            @foreach ($courses as $course)                    
                 <!-- llamamos el componente course-card.blade -->                  
                 <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
    <x-team-section></x-team-section>
    <x-footer-section></x-footer-section>
</x-app-layout>

