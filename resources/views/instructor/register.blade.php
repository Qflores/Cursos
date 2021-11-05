<x-app-layout>
    <div class="container mt-1">
    <div class="min-h-full flex items-center justify-center py-2 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto h-20 w-auto" src="{{ asset('img/home/loog_cegicap_azul2.png') }}" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Complete los datos para formar parte del equipo
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
            
            <a class="font-medium text-indigo-600 hover:text-indigo-500">
                Empiece a dictar clases con los mejores docentes
            </a>
            </p>
        </div>
      
        <div class="font-sans">
            <div class="relative min-h-screen flex flex-col sm:justify-start items-center bg-gray-100 bg-opacity-25">
                <div class="relative md:max-w-xl w-full">
                    <div class="bg-green-400 bg-opacity-50 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                    <div class="bg-green-400 bg-opacity-25 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                    <div class="bg-green-600 bg-opacity-25 border-green-600 border-2 relative w-full rounded-3xl  px-6 py-6  shadow-md">
                        <label for="" class="block mt-3 text-lg text-gray-100 text-center font-bold">
                            Registrate
                        </label>
                        <form method="POST" action="{{ route('newinstructor.register')}}"  class="mt-10">
                            @csrf          
                            <div class="mb-6">
                                <label
                                class="block text-gray-100 text-sm font-bold mb-2"
                                for="name"
                                >
                                Nombres
                                </label>
                                <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                v-model="form.name"
                                type="text"
                                placeholder="name"
                                name="name"
                                required
                                autocomplete="current-name"
                                />
                                @error('name')
                                    <span class="text-red-500 text-sm font-bold">{{ $message}}</span>
                                @enderror
                            </div>
                
                            <div class="mb-6">
                                <label
                                class="block text-gray-100 text-sm font-bold mb-2"
                                for="password"
                                >
                                Correo
                                </label>
                                <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                v-model="form.email"
                                type="email"
                                placeholder="email"
                                name="email"
                                required
                                autocomplete="current-email"
                                />
                                @error('email')
                                    <span class="text-red-500 text-sm font-bold">{{ $message}}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label
                                class="block text-gray-100 text-sm font-bold mb-2"
                                for="password"
                                >
                                Biografia
                                </label>
                                <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                v-model="form.text"
                                type="text"
                                placeholder="Ingrese su biografía"
                                name="biografia"
                                required
                                autocomplete="current-biografia"
                                ></textarea>
                                @error('biografia')
                                    <span class="text-red-500 text-sm font-bold">{{ $message}}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label
                                class="block text-gray-100 text-sm font-bold mb-2"
                                for="password"
                                >
                                Password
                                </label>
                                <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                v-model="form.password"
                                type="password"
                                placeholder="Password"
                                name="password"
                                required
                                autocomplete="current-password"
                                />
                                @error('password')
                                    <span class="text-red-500 text-sm font-bold">{{ $message}}</span>
                                @enderror
                            </div>               
                
                            <div class="mt-7">
                                <button type="submit" class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    Registrarme
                                </button>
                            </div>
                
                            <div class="flex mt-7 items-center text-center">
                                <hr class="border-gray-300 border-1 w-full rounded-md">
                                <label class="block font-medium text-sm text-gray-600 w-full">
                                    Registrate con
                                </label>
                                <hr class="border-gray-300 border-1 w-full rounded-md">
                            </div>
                
                            <div class="flex mt-7 justify-center w-full">
                                <button class="mr-5 bg-blue-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    
                                    Facebook
                                </button>
                
                                <button class="bg-red-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    
                                    Google
                                </button>
                            </div>
                
                            <div class="mt-7">
                                <div class="flex justify-center items-center">
                                    <label class="mr-2" >¿Ya tienes una cuenta?</label>
                                    <a href="{{ route('login') }}" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                        Iniciar sesion
                                    </a>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>
</div>
    
</x-app-layout>