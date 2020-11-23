<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Mvp;
use App\Articles;
use App\Mvp_type;
use App\Hiring;
use App\Work;
use App\Tickets_type;
use App\User;
use App\PaymentMethod;

class HomeController extends Controller
{

  public function home()
  {
    $mvps = Mvp::where('is_deleted',0)
                ->where('is_approved',1)
                ->where('is_available',1)->limit(4)->orderBy('id', 'DESC')->get();
    $articles = Articles::where('is_published',1)
                        ->where('is_deleted',0)->limit(3)->orderBy('id', 'DESC')->get();

    // for site numbers
    $users_count = User::count();
    $mvp_count = Mvp::count();
    $work_count = Work::count();
    $hiring_count = Hiring::count();

    return view('index')
            ->with('mvps',$mvps)
            ->with('articles',$articles)
            ->with('users_count',$users_count)
            ->with('mvp_count',$mvp_count)
            ->with('work_count',$work_count)
            ->with('hiring_count',$hiring_count);
  }

  public function index(){
      if(!Auth::check()){
          $mvps = Mvp::where('is_deleted',0)
                      ->where('is_approved',1)
                      ->where('is_available',1)->limit(4)->orderBy('id', 'DESC')->get();
          $articles = Articles::where('is_published',1)
                              ->where('is_deleted',0)->limit(3)->orderBy('id', 'DESC')->get();
          return view('index')
                  ->with('mvps',$mvps)
                  ->with('articles',$articles);
      }else{
          $mvp_type = Mvp_type::where('is_active',1)->orderBy('id', 'DESC')->get();
          $tickets_type = Tickets_type::where('is_active',1)
                              ->where('is_deleted',0)->orderBy('id', 'DESC')->get();
          $payment_methods = PaymentMethod::orderBy('id', 'DESC')->get();

          return view('social.index')
                  ->with('mvp_type',$mvp_type)
                  ->with('tickets_type',$tickets_type)
                  ->with('payment_methods',$payment_methods);
      }
  }

  public function hiringRequest(Request $request){
    if($request->has('hiring_btn')){
      $this->validate($request,[
        'job_title' => 'required|string',
        'sallary' => 'required|string',
        'job_description' => 'required|string',
        'job_qualifications' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email'
      ]);

      Hiring::create([
        'job_title' => $request->job_title,
        'sallary' => $request->sallary,
        'job_description' => $request->job_description,
        'job_qualifications' => $request->job_qualifications,
        'phone' => $request->phone,
        'email' => $request->email
      ]);
      return redirect()->back()->with('info','تم ارسال طلب التوظيف بنجاح , سيتم التواصل معك قريبا');
    }
  }


  // usage policy
  public function policy(){
    return view('policy');
  }

  // usage guide
  public function guide(){
    return view('guide');
  }

  public function contractGuide(){
    return view('contract_guide');
  }


}
