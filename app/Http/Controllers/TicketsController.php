<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use Auth;

class TicketsController extends Controller
{
    public function postTickets(Request $request){
      $this->validate($request,[
        'subject' => 'required',
        'content' => 'required|string'
      ]);

      $subject = json_encode($request->subject,JSON_UNESCAPED_UNICODE);

      Tickets::create([
        'user_id' => Auth::user()->id,
        'subject' => $subject,
        'content' => $request->content,
        'is_closed' => 0,
        'is_deleted' => 0
      ]);

      return redirect()->back()->with('info','تم ارسال التذكرة وسيتم الرد عليها في اقرب فرصة ممكنة');
    }
}
