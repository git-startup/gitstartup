<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets_type;
use App\PaymentMethod;
use Auth;

class MessengerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      $tickets_type = Tickets_type::where('is_active',1)
                          ->where('is_deleted',0)->orderBy('id', 'DESC')->get();
      $payment_methods = PaymentMethod::get();

      return view('messages.index')
        		->with('tickets_type',$tickets_type)
            ->with('payment_methods',$payment_methods);
    }

}
