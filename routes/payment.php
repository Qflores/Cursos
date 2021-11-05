<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebhooksController;

Route::get('{course}/checkout',[PaymentController::class,'checkout'])->name("checkout");
Route::get('{course}/pay',[PaymentController::class,'pay'])->name("pay");
Route::get('{course}/approved',[PaymentController::class,'approved'])->name("approved");

//pagos con mercado pagos
Route::get('orders/{id}', [OrderController::class,'show'])->name('orders.show');
//para recuperar si se pago o no a mercadopago
//cada vez que se efectue un pago mercado pago redirecciona a esta ruta
Route::get('orders/{course}/pay', [OrderController::class,'pay'])->name('orders.pay');

//MENSAJES DE MERCADO PAGO

Route::post('Webhooks', WebhooksController::class);
