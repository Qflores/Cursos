<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover object-cover w-full h-full" style="width: 100%; background-image: url('{{ asset('img/home/busines467763280.jpg') }}') ">
    <div class="bg-white bg-opacity-50 shadow-md px-5 py-5 rounded-lg">        
        <img class=" h-20 w-full object-cover" src="{{asset('img/home/loog_cegicap_azul2.png')}}" alt="">
    </div>

    <div class="w-full sm:max-w-md mt-2 px-6 py-4 border-black-600 bg-blue-800 bg-opacity-75 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
