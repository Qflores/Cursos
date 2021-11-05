@props(['category'])

<div>
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="w-full text-start pb-8">           
        
            <h1 class="font-bold text-lg md:text-4xl lg:text-5xl font-heading text-gray-900 pb-2">
                Categoría de cursos
            </h1>
        </div>
        
        {{-- @foreach ($categories as $category)  
            @php
                $var = 0;
                $max = 3;    
            @endphp 
            @if ($var = $max)
                @php
                $var = 0;    
                @endphp 
                <div class="flex mx-auto  md:grid-cols-6 py-2 w-sull  justify-center">
            @endif          
                 @php
                    $var++;    
                @endphp    
                <div class="flex items-center justify-center p-6 col-span-1 md:col-span-2 lg:col-span-1">
                    <div class="flex items-center space-x-6 mb-4 mx-10">
                        <i class="{{ $category->icon }}"></i>
                        <div>
                            <p class="text-xl text-gray-700 font-normal mb-1">{{ $category->name }} </p>
                        </div>
                    </div>                    
                </div>                
            </div>
            @if ($var = $max)
                </div>
            @endif 
         @endforeach--}}
        {{--  --}}

        <div class="flex mx-auto  md:grid-cols-6 py-2 w-sull  justify-center">
            <div class="flex items-center justify-center p-6 col-span-1 md:col-span-2 lg:col-span-1">
                
                <div class="flex items-center space-x-6 mb-4 mx-10">
                    <img class="h-28 w-28 object-cover object-center rounded-full" 
                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                    <div>
                        <p class="text-xl text-gray-700 font-normal mb-1">Dany Bailey</p>
                        <p class="text-base text-blue-600 font-normal">Software Engineer</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6 mb-4">
                    <img class="h-28 w-28 object-cover object-center rounded-full" 
                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                    <div>
                        <p class="text-xl text-gray-700 font-normal mb-1">Dany Bailey</p>
                        <p class="text-base text-blue-600 font-normal">Software Engineer</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6 mb-4">
                    <img class="h-28 w-28 object-cover object-center rounded-full" 
                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                    <div>
                        <p class="text-xl text-gray-700 font-normal mb-1">Dany Bailey</p>
                        <p class="text-base text-blue-600 font-normal">Software Engineer</p>
                    </div>
                </div>
            </div>

            
        </div>


    </section>
    
</div>