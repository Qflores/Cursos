<div>
    <!--  se renderira la busqueda por categoria y profe etc-->
    <div class="bg-gray-200 py-2 mb-15">

        <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 flex">
            
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                    <i class="fas fa-archway text-xs mr-2"></i> Todo los cursos
            </button>
           
            <!-- Dropdown Categorias-->
            <!-- Definir variable para trabajar con alpine: x-data -->
            <div class="relative mr-4" x-data="{ open: false }">
                <!-- agregamos un evento en el evento click en el boton-->
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow " x-on:click="open = !open">
                    <i class="fas fa-tags text-sm mr-2"></i> Categorías 
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <!-- para mostrar dropdowmn ponemos elmetodo de alpine -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show=" open " x-on:click.away="open = false">   
                    <!-- mostrando todas las categorias-->
                    @foreach($categories as $category)
                        <a wire:click="$set('category_id',{{$category->id}})" class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-orange-500 hover:text-white"  x-on:click="open=false">    
                            {{ $category->name }}
                        </a>
                        <!--<div class="py-2">
                            <hr></hr>
                        </div>-->
                    @endforeach
                </div>
            <!-- // Dropdown Body -->
            </div>
            
            <!-- Dropdown Niveles-->
            <div class="relative" x-data="{ open: false }">
                <!-- agregamos un evento en el evento click en el boton-->
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow " x-on:click="open = !open">
                    <i class="fas fa-tags text-sm mr-2"></i> Niveles 
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <!-- para mostrar dropdowmn ponemos elmetodo de alpine -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show=" open " x-on:click.away="open = false">   
                    @foreach($levels as $level)    
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-orange-500 hover:text-white" wire:click="$set('level_id',{{$level->id}})" x-on:click="open=false">
                           {{ $level->name }} 
                        </a>
                        <!--<div class="py-2">
                            <hr></hr>
                        </div>-->
                    @endforeach                    
                </div>
            <!-- // Dropdown Body -->
            </div>
        </div>
    </div>


    <!-- lista de cursos-->
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">                 
        @foreach ($courses as $course)  
            <!-- llamamos el componente course-card.blade -->                  
            <x-course-card :course="$course" />
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-4">
        <!--  paginado--->
        {{$courses->links()}}
    </div>
   {{-- impresion de categorias --}}
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1  gap-x-6 gap-y-8">
        <article class="flex flex-col">
            <h1 class="text-center text-3xl text-gray-600">CATEGORÍS DE CURSOS</h1>
        </article>
    </div>

    <div class=" max-w-6xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        
        @foreach ($categories as $category) 
        <article class="flex flex-col">
            
            <div class="flex-1 flex flex-col">
                <div class="flex items-center justify-center p-2 col-span-1 md:col-span-2 lg:col-span-1">
                    <a wire:click="$set('category_id',{{$category->id}})" class="cursor-pointer hover:text-blue-500 flex items-center space-x-6 mb-2 mx-5">
                        <i class="{{ $category->icon }}"></i>
                        <div>
                            <p  class="text-xl text-gray-700 font-normal mb-1 hover:text-blue-500">{{ $category->name }} </p>
                        </div>
                    </a>
                </div>
            </div>
            
        </article>
        @endforeach

    </div>

    <x-call-action></x-call-action>

    <x-team-section></x-team-section>
    <x-footer-section>    </x-footer-section>
</div>
