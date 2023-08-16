<?php

namespace App\Http\Controllers;

use App\Helpers\payment\paymentTrait;
use Illuminate\Http\Request;




class PaymentController extends Controller
{
    use paymentTrait;
  
    public function goToPayment(Request $request)
    {
      $this->payment($request->total);
    }
   

}
