
@props(['course'])
<article class=" flex flex-col shadon-blue-course rounded-none">
    <figure>                        
        @isset($course->image)
            <img class=" h-38 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
        @else
            <img class=" h-38 w-full object-cover" src="{{ asset('img/home/default-cover.jpg') }}" alt="">
        @endisset
    </figure>                   
    
    <div class="card-body flex-1 flex flex-col background-card" >
        <h1 class=" text-white font-bold">{{Str::limit($course->title), 30}}</h1>
        <p class="colortext-profesor text-md mb-2 mt-auto">Prof: {{Str::limit($course->teacher->name), 30}} </p>
        
        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1">
                    <i class="fas fa-star text-{{$course->rating >=1 ? 'yellow' : 'yellow'}}-400">

                    </i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{$course->rating >=2 ? 'yellow' : 'yellow'}}-400">

                    </i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{$course->rating >=3 ? 'yellow' : 'yellow'}}-400">

                    </i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{$course->rating >=4 ? 'yellow' : 'yellow'}}-400">

                    </i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{$course->rating ==5 ? 'yellow' : 'gray'}}-400">

                    </i>
                </li>
            </ul>
            <!-- cantidad de estudienates matericulados
            ml-auto     //posicionar a la derechas
        -->
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                {{$course->students_count}}
            </p>
        </div>
        @if($course->price->value == 0) 
            <p class="my-2 ">
               <span class="text-purple-400 font-bold">Gratis</span>  
            </p>
        @else
            <p class="my-2 text-green-500 font-bold">
               US$ {{ $course->price->value}}                
            </p>
        @endif
        
        <a href="{{ route('courses.show',$course->slug) }}">
            <button class="btn-block  btn btn-primary text-button-black">
                Entrar al curso
            </button>
        </a>
        
    </div>
</article>