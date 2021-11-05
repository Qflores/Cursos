<x-app-layout>
 <!--- portada--->
    <section class="bg-cover  left-0 bottom-0 w-full  z-10" style=" background-image: url({{asset('img/home/blogs.jpg')}})">

         <span class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">Blog</span>
         <h2 class="text-4xl font-semibold text-shadow-black leading-tight mx-5 sm:px-6 lg:px-3 py-5">
              Pellentesque a consectetur velit, ac molestie ipsum. Donec sodales, massa et auctor.
            </h2>
            
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                
                <h1 class="text-shadow-black font-fold text-4xl">Domina la tecnología</h1>
                <p class="text-shadow-black text-lg mb-4" >Encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollador web</p>

                @livewire("search")

            </div>

        </div>
    </section>
{{-- aqui adjuntamos vista principal de blog --}}
    @livewire('blog-index')

</x-app-layout>