<?php

namespace App\Http\Controllers;

use App\Helpers\payment\paymentTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{
  use paymentTrait;
/**
 * payment
 *
 * @param Request $request
 * @return void
 */
  public function goToPayment(Request $request)
  {
    $data = ['user' => Auth::user(), 'total' => $request->total, 'url' => URL::to('/')];
    $this->payment($data);
  }
}
