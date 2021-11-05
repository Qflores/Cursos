<div>
    
    <section class="bg-gray-200  flex justify-center flex-wrap py-5 px-15 justify-center">
         
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-4 flex flex-col items-center p-4 bg-white shadow-lg rounded mx-2 mb-4 flex-1 mb-2 md:mb-0  md:w-1/2 sm:flex-initial">
            <div class="grid gap-6 mb-8 md:grid-cols-2">
              <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h3 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Conviértete en instructor
                </h3>
                <p class="text-gray-600 dark:text-gray-400 pt-5">
                  Los mejores instructores de todo el Perú enseñan a miles de estudiantes a través de CEGICAP.
                </p>
                <div class="h-15 pt-5">
                    <a class="btn btn-danger"  href="{{ route('newinstructor')}}" target="_blank" rel="noopener noreferrer">Empieza a enseñar hoy</a>
                </div>
              </div>
              <div class="min-w-0 p-4 text-black bg-gray-100  shadow-xs">
                <h4 class="mb-4 font-semibold">
                  Dicta con los mejores
                </h4>
                <figure class="">                    
                    <img class="h-40 rounded-lg" src="{{ asset('img/home/webinargbbb7566c3.jpg')}}" alt="">
                </figure>
              </div>
            </div>



        </div>

        <!-- divider -->
        <hr class="my-6"> 

        <!-- dark mode -->
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-4 flex flex-col items-center p-4 bg-white shadow-lg rounded mx-2 mb-4 flex-1 mb-2 md:mb-0  md:w-1/2 sm:flex-initial">
            <div class="overflow-hidden shadow-md text-gray-100">
               <div class="grid gap-6 mb-8 md:grid-cols-2">
                    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <h3 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                            Tranformar el acceso a la educación
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Cree una cuenta para recibir nuestra boletíon, recomendaciones  de cursos y promociones.
                        </p>
                        <div class="h-15 pt-5">
                            <a class="btn bg-blue-800"  href="{{ route('register')}}" target="_blank" rel="noopener noreferrer">Regístrate gratis</a>
                        </div>
                    </div>
                    <div class="min-w-0 p-4 text-black bg-gray-100 rounded-lg shadow-xs">
                        <h4 class="mb-4 font-semibold">
                            Colored card
                        </h4>
                        <figure class="">                    
                            <img class="h-40 rounded-lg" src="{{ asset('img/home/webinargbbb7566c3.jpg')}}" alt="">
                        </figure>
                       
                    </div>
                </div>
               
            </div>
        </div>
    </section>
</div>