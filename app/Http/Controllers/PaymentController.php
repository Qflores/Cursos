<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CourseController;

use Illuminate\Http\Request;
use App\Models\Course;

class PaymentController extends Controller
{
    public function checkout(Course $course){
        return view("payment.checkout",compact("course"));
    }

    public function pay(Course $course){
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
        );


        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($course->price->value); //obteneiendo el precio del curso
        $amount->setCurrency('USD'); // tipo de moneda

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        //url si confirma el pago
        $redirectUrls->setReturnUrl(route('paymentapproved', $course))
            //cuando el usuario pone cancelar la compra: redireccionamos la siguiente ruta
            ->setCancelUrl(route('paymentcheckout', $course));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        // After Step 3
        try {
            $payment->create($apiContext);
            return redirect()->away($payment->getApprovalLink());            
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getMesssage();
            echo $ex->getData();
        }

        return "Hola mundo";
    }



    public function approved(Request $request, Course $course){

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
        );
        

        $paymentId = $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
        
        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        // (See bootstrap.php for more on `ApiContext`)
        $payment->execute($execution, $apiContext);

        $course->students()->attach(auth()->user()->id);

        return redirect()->route("courses.status", $course);
        

    }




}
