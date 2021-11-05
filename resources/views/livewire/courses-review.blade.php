<section class="mt-4 ">

    <h1 class="font-bold text-3xl mb-2">Valoración</h1>
  
    @can ('enrolled', $course) 
        <article class="shadown-lg mb-4">

            @can('valued',$course)  
            {{--  
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
                    <i class="far fa-thumbs-up text-3xl text-blue-800" title="Guardar comentario"></i>
                </div>
            </div>
            --}}
            @else
                <div class="font-bold px-4 py-3 leading-normal text-black bg-gray-300 rounded-lg mb-5" role="alert">
                    <p>Usted debe completar curso</p>
                </div>
            @endcan

        </article>
    @endcan

    <div class="card">
        <div class="card-body">
            <p class="text-blue-500 text-2xl mb-5 ">{{ $course->reviews->count() }} Valoraciones</p>
            
            @foreach ($course->reviews as $review)
                <article class="flex mb-4 text-gray-800 shadon-blue">
                    <figure class="mr-0 ml-2 flex items-center justify-center ">
                        <img  class="h-12 w-12 object-cover rounded-full shadown-lg " src="{{ $review->user->profile_photo_url }}" alt="">
                    </figure>
                
                    <div class="card flex-1 ml-5">
                        <div class="card-body backgroun-blue">
                            <p class="flex justify-between">
                                <b class="text-gray-100  text-xl font-bold">{{ $review->user->name }} <i class="fas fa-star text-yellow-300"></i> ({{ $review->rating }})
                                </b><span class="text-xs text-gray-600"><i class="far fa-clock"></i> {{ $review->created_at }}</span>
                            </p>
                            {{ $review->comment }}
                        </div>
                    </div>
                </article>
            @endforeach

        </div>
    </div>
</section>
