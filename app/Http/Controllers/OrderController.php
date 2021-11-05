<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class OrderController extends Controller
{
    public function show(Course $course){

        return view("payment.checkout",compact('$course'));

        $course->students()->attach(auth()->user()->id);

        return redirect()->route("courses.status", $course);

    }

    //para proesar el pago con mercado pago
    public function pay(Course $course, Request $request){
        //recuperar loq eu se manda por la url
        //RECUPERANDO PAYMENTID
        $payment_id = $request->get('payment_id');

        //consulta del estado de la peticion a la pagina de mercado pago
        $response =  Http::get("https://api.mercadopago.com/v1/payments/".$payment_id."?access_token=".config('services.mercadopago.token'));
      
        $response = json_decode($response);
       
        $status = $response->status;

        //dump($response);

        if($status == 'approved'){

           // return auth()->user()->id .' =>' .$course->id;

            //CON ESTE AGREGAMOS EL CURSO COMPRADO
           $course->students()->attach(auth()->user()->id);
            //Y RETORNAMOS A LA VISTA REPRODUCIR CURSO

            return redirect()->route("courses.status", $course);

        }else{
            //SI FALLA REGRESAMOS A LA PAGINA DE COMPRAS
            return view("payment.checkout",compact("course"));

            //return $course;
        }

    }

    
}
