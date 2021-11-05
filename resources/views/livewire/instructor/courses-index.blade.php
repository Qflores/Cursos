<div class="container py-8">

    <x-table-responsive>

        <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search" type="text" class="form-input flex-1 shadow-sm" placeholder="Ingrese nombre del curso">
            <a href="{{ route('instructor.courses.create') }}" class=" btn btn-primary ml-2"><i class="fas fa-plus-circle"></i> Crear Nuevo Curso </a>
        </div>

        @if ($courses->count()>0)
        
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-400 text-white font-bold">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left font-bold text-xs font-medium  uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-bold text-xs font-medium  uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-bold text-xs font-medium  uppercase tracking-wider">
                            Calificación
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-bold text-xs font-medium  uppercase tracking-wider">
                            Estado
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Editar</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="">
                                        @else
                                            <img class="h-10 w-10 rounded-full object-cover  object-center" src="{{ asset('img/home/default-cover.jpg') }}" alt="">
                                        @endisset
                                        
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $course->title }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $course->category->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $course->students->count() }}</div>
                                <div class="text-sm text-gray-500">Alumnos Matriculados </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center"> 
                                    {{ $course->rating }}  
                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >=1 ? 'yellow' : 'gray'}}-400">
                        
                                            </i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >=2 ? 'yellow' : 'gray'}}-400">
                        
                                            </i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >=3 ? 'yellow' : 'gray'}}-400">
                        
                                            </i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >=4 ? 'yellow' : 'gray'}}-400">
                        
                                            </i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating ==5 ? 'yellow' : 'green'}}-400">
                        
                                            </i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">Valoracion del curso</div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                
                                    @switch($course->status)
                                        @case(1)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                                                Borrador
                                            </span>
                                            @break
                                        @case(2)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-green-800">
                                                Revisión
                                            </span>
                                            @break
                                        @case(3)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Publicado
                                            </span>
                                            @break
                                        @default
                                            
                                    @endswitch                                    
                                
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-300 text-green-800">
                                    <a href="{{ route('instructor.courses.edit',$course) }}" class="text-indigo-600 hover:text-indigo-900">Editar Curso</a>
                                </span>
                                
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>

            <div class="px-4 py-6">
                {{ $courses->links()}}
            </div>
        @else
            <div class="bg-red-300 py-6 px-4">
                <h4>No hay registros</h4>
            </div>
        @endif   

    </x-table-responsive>   
</div>
