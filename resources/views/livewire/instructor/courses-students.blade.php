<div>
    <h1 class="text-2xl font-bold mb-4">ESTUDIANTES DEL CURSO</h1>

    <x-table-responsive>

        <div class="px-6 py-4">
            <input wire:model="search" type="text" class="form-input flex-1 w-full shadown-sm" placeholder="Ingrese nombre del curso">
        </div>

        @if ($students->count()>0)        
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-400 text-white font-bold">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left font-bold text-xs font-medium  uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left font-bold text-xs font-medium  uppercase tracking-wider">
                        Email
                    </th>
                    
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Editar</span>
                    </th>
                </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                                                                
                                        <img class="h-10 w-10 rounded-full  object-cover object-center" src="{{ $student->profile_photo_url }}" alt="">
                                        
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $student->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $student->email }}</div>
                            </td>                            
                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-300 text-green-800">
                                    <a href="" class="text-indigo-600 hover:text-indigo-900">ver</a>
                                </span>                                
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>

            <div class="py-6 px-4">
                {{ $students->links()}}
            </div>
        @else
            <div class="bg-red-300 py-6 px-4">
                <h4>No hay registros</h4>
            </div>
        @endif   

    </x-table-responsive>  




</div>
