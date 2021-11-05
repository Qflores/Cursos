<div>
     <div class="max-w-15xl mx-auto sm:px-6 lg:px-5 grid grid-cols-1  gap-x-2 gap-y-4">
        <div class="flex flex-col max-w-7x1 mx-auto px-4 sm:px-6 lg:px-5 flex">
                
            <div class="block lg:space-x-2 px-2 lg:p-0 mt-5 mb-2">
        <!-- post cards -->
                <div class="w-full lg:w-2/3">
                    @foreach ($blogs as $blog)
                    <a class="block rounded w-full lg:flex mb-10"href="#">
                        <div class="h-48 lg:w-48 flex-none bg-cover text-center overflow-hidden opacity-75"
                            style="background-image: url('{{ Storage::url($blog->url)}}')" 
                            title="deit is very important" >
                            
                        </div>
                        <div class="bg-white rounded px-4 flex flex-col justify-between leading-normal">
                            <div>
                                <div class="mt-3 md:mt-0 text-gray-700 font-bold text-2xl mb-2">
                                {{ $blog->title}}
                                </div>
                                <p class="text-gray-700  w-full">
                                 {{ $blog->mensaje}}
                                </p>
                            </div>
                            <div class="flex mt-3">
                                <img src="{{ $blog->teacher->profile_photo_url }}" class="h-10 w-10 rounded-full mr-2 object-cover" />
                                <div>
                                <p class="font-semibold text-gray-700 text-sm capitalize text-blue-600 font-bold"> {{$blog->user->name}} </p>
                                <p class="text-gray-600 text-xs"> {{ $blog->created_at}} </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-4">                
                        {{$blogs->links()}}
                    </div>

                </div>
                



        <!-- right sidebar -->
        <div class="w-full lg:w-1/3 px-3">
          <!-- topics -->
          <div class="mb-4">
            
            <h5 class="font-bold text-lg uppercase text-gray-700 px-1 mb-2"> Popular Topics </h5>

            <ul>
              <li class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                  <span class="inline-block h-4 w-4 bg-green-300 mr-3"></span>
                  Nutrition
                  <span class="text-gray-500 ml-auto">23 articles</span>
                  <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                </a>
              </li>
              <li class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                  <span class="inline-block h-4 w-4 bg-indigo-300 mr-3"></span>
                  Food & Diet
                  <span class="text-gray-500 ml-auto">18 articles</span>
                  <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                </a>
              </li>
              <li class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                  <span class="inline-block h-4 w-4 bg-yellow-300 mr-3"></span>
                  Workouts
                  <span class="text-gray-500 ml-auto">34 articles</span>
                  <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                </a>
              </li>
              <li class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                  <span class="inline-block h-4 w-4 bg-blue-300 mr-3"></span>
                  Immunity
                  <span class="text-gray-500 ml-auto">9 articles</span>
                  <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                </a>
              </li>
            </ul>
          </div>

          <!-- divider -->
          <div class="border border-dotted"></div>

          <!-- subscribe -->
          <div class="p-1 mt-4 mb-4">
            <h5 class="font-bold text-lg uppercase text-gray-700 mb-2"> Subscribe </h5>
            <p class="text-gray-600">
              Subscribe to our newsletter. We deliver the best health related articles to your inbox
            </p>
            <input placeholder="your email address"
              class="text-gray-700 bg-gray-100 rounded-t hover:outline-none p-2 w-full mt-4 border" />
            <button class="px-4 py-2 bg-indigo-600 text-gray-200 rounded-b w-full capitalize tracking-wide">
              Subscribe
            </button>
          </div>

          <!-- divider -->
          <div class="border border-dotted"></div>

        </div>

        </div>
    </div>


    </div>
    
    <x-team-section></x-team-section>
    <x-footer-section>    </x-footer-section>

</div>
