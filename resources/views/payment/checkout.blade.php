<x-app-layout>

    @php
        // SDK de Mercado Pago
        require  base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        /*foreach ($productos as $product) {
            $item = new MercadoPago\Item();
            $item->title = $course->title;
            $item->quantity = 1;
            $item->unit_price = $course->price->value*3.99;
            $product[] = $item;
        }*/

        $item = new MercadoPago\Item();
        $item->title = $course->title;
        $item->quantity = 1;
        $item->unit_price = $course->price->value*3.99;

        //cuando el pago se realiza correctamente nos redirecciona a

        $preference->back_urls = array(
            "success" => route('paymentorders.pay', $course),    // si el pago fue exitoso va esta ruta
            //"failure" => "http://www.tu-sitio/failure",     //si el pago falla va a esta ruta
            //"pending" => "http://www.tu-sitio/pending"      // si el pago va ser pendiente va a esta ruta
        );

        $preference->auto_return = "approved";



        $preference->items = array($item);
        $preference->save();

    @endphp

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Lista de pagos</h1>
    
    <div class="card text-gray-600">
        <div class="card-body">

            <article class="flex items-center">
                <img class="h-12 w-12 object-cover" src="{{ Storage::url($course->image->url)}}" alt="{{$course->title}}" >
                <h1 class="text-lg ml-2">{{ $course->title }}</h1>
                <p class="text-xl font-bold ml-auto">US$ {{ $course->price->value}} </p>
            </article>

            <div class="flex justify-center mt-4 mb-4">
                <div class="ml-15">
                    <picture class="mb-15"> <img class="object-cover  h-20 w-40" src="{{ asset('img/home/paypalpagos.jpg') }}" alt=""></picture>
                    <a href="{{route('paymentpay',$course)}}" class="btn btn-primary">Pagar</a>
                </div>

                <div class="ml-15">
                    <picture class="mb-15 mt-15"> <img class="object-cover h-20 w-40" src="{{ asset('img/home/mercadoqago.jpg') }}" alt=""></picture>
                    <div class="cho-container">
                    </div>
                </div>
                
            </div>

            <hr class="mt-4">
            <p class="mt-5 text-sm mt-4">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum dolorum optio odit vero est perspiciatis tempora numquam, minus quidem consequuntur fuga, aperiam, esse facere eum sit dolores hic facilis earum?
                <a href="" class="text-red-500 font-bold">Términos y condiciones</a>
            </p>

        </div>
    </div>
    </div>
    {{-- cdn de mercadopago --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        // Agrega credenciales de SDK
          const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
                locale: 'es-AR'
          });
        
          // Inicializa el checkout
          mp.checkout({
              preference: {
                  id: '{{ $preference->id }}'
              },
              render: {
                    container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
              }
        });
    </script>


</x-app-layout>