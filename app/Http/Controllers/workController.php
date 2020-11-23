<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon;
use DateTime;
use App\User;
use App\Work;
use App\Hiring;
use App\Apply_for_job;
use App\Mvp_type;
use App\Tickets_type;
use App\PaymentMethod;
use App\Message;
use Mail;
use Validator;
use App\Mail\NotifyUserForNewWorkRequest;
use App\Mail\NotifyUserForAcceptingWorkRequest;
use App\Mail\NotifyUserForRejectingWorkRequest;
use App\Events\workNotification;


class workController extends Controller
{
    public function getIndex(){

        $requests = Work::where('worker_id',Auth::user()->id)
                        ->where('is_deleted',0)->with('user')->orderBy('id', 'DESC')->get();

        $requests_pending = Work::where('user_id',Auth::user()->id)
                        ->where('is_deleted',0)->orderBy('id', 'DESC')->get();

        $mvp_type = Mvp_type::where('is_active',1)->orderBy('id', 'DESC')->get();

        $tickets_type = Tickets_type::where('is_active',1)
                            ->where('is_deleted',0)->orderBy('id', 'DESC')->get();
        $payment_methods = PaymentMethod::orderBy('id', 'DESC')->get();

        $hiring_request = Hiring::where('is_deleted',0)
                                ->where('is_approved',1)
                                ->where('is_closed',0)->get();

        return view('workers.index')
        ->with('requests',$requests)
        ->with('requests_pending',$requests_pending)
        ->with('mvp_type',$mvp_type)
        ->with('tickets_type',$tickets_type)
        ->with('hiring_request',$hiring_request)
        ->with('payment_methods',$payment_methods);

    }

    public function addWorker(Request $request){

      $this->validate($request,[
        'work_title'           => 'required|string|max:50',
        'sallery'              => 'required|integer',
        'agreement'            => 'required|string',
        'start_of_agreement'   => 'required|date',
        'end_of_agreement'     => 'required|date'
      ]);

      $user = User::where('id',$request->worker_id)->first();
      if(!$user){
          return redirect()->back()->with('info','هذا المستخدم غير موجود حاليا');
      }
      if(Auth::user()->id === $user->id){
          return redirect()->back()->with('info','لا يمكنك ارسال طلب عمل لنفسك');
      }

      /*
      if(Auth::user()->total < $request->sallery){
        return redirect()->back()->with('info','ليس لديك رصيد كافي لتكملة الطلب  .. الرجاء اعادة شحن الحساب');
      }*/


      $work_request = Work::create([
        'user_id'          => Auth::user()->id,
        'worker_id'        => $user->id,
        'accepted'         => 0,
        'work_title'       => $request->work_title,
        'agreement'        => $request->agreement,
        'start_of_agreement' => $request->start_of_agreement,
        'end_of_agreement' => $request->end_of_agreement,
        'sallery'         => $request->sallery,
        'is_deleted' => 0
      ]);

      // transform mony from user total to work total
      /*$total = Auth::user()->total - $request->sallery;
      $work_total = $request->sallery;
      User::where('id',Auth::user()->id)->update([
        'total' => $total,
        'work_total' => $work_total
      ]);*/

      try {
        // to broducst the message
        broadcast(new workNotification($user));
        // send maeeage to user - about the work request
        Mail::to($user->email)->queue(new NotifyUserForNewWorkRequest($work_request, $user));
      } catch (\Exception $e) {
          //return false;
      }


      return redirect()->back()->with('info','تم ارسال طلب العمل بنجاح');


    }

    public function postAccept(Request $request){

        Work::where('id',$request->work_id)->update([
          'accepted' => 1
        ]);

        $user = User::where('id',$request->user_id)->first();

        try {
          Mail::to($user->email)->queue(new NotifyUserForAcceptingWorkRequest($user));
        } catch (\Exception $e) {
            //return false;
        }


        return redirect()->back()->with('info','تم قبول طلب العمل');

    }

    public function postEdit(Request $request){

      $this->validate($request,[
        'work_title'           => 'required|string|max:50',
        'sallery'              => 'required|integer',
        'agreement'            => 'required|string',
        'start_of_agreement'   => 'required|date',
        'end_of_agreement'     => 'required|date'
      ]);

      Work::where('id',$request->work_id)->update([
        'work_title' => $request->work_title,
        'start_of_agreement' => $request->start_of_agreement,
        'end_of_agreement' => $request->end_of_agreement,
        'sallery' => $request->sallery,
        'agreement' => $request->agreement,
        'is_rejected' => 0
      ]);
      return redirect()->back()->with('info','تم تحديث البيانات بنجاح  ');
    }

    public function postReject(Request $request){
      Work::where('id',$request->work_id)->update([
        'is_rejected' => 1
      ]);

      $user = User::where('id',$request->work_id)->first();
      try {
        Mail::to($user->email)->queue(new NotifyUserForRejectingWorkRequest($user));
      } catch (\Exception $e) {
          //return false;
      }
      return redirect()->back()->with('info','  تم رفض الطلب بنجاح ');
    }

    public function postDelete(Request $request){
        // get the work request record
        /*$work_request = Work::find($request->work_id);
        // get work request sender
        $project_owner  = User::find($work_request->user_id);
        // take project sallery from work sender work_title
        $work_total = $project_owner->work_total - $work_request->sallery;
        // add project sallery to work sender total
        $total = $project_owner->total + $work_request->sallery;
        // update user accounts
        User::where('id',$work_request->user_id)->update([
          'total' => $total,
          'work_total' => $work_total
        ]);*/
        // delete work request
        Work::where('id',$request->work_id)->update([
          'is_deleted' => 1
        ]);
        return redirect()->back()->with('info','تم حذف الطلب بنجاح');
    }

    // to update work request to Complete
    public function postComplete(Request $request){
      if($request->has('complete_worker')){
        Work::where('id',$request->work_id)->update(['is_completed' => 1]);
        return redirect()->back()->with('info','تم تحويل حالة الاتفاق لمكتمل');
      }
      return redirect()->back()->with('info','حصل خطأ ما');
    }


    // apply for job
    public function postApply(Request $request){

        $this->validate($request,[
            'link' => 'required|string',
            'offer' => 'required|string',
            'cv'   => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120'
        ]);

        if($request->hasFile('cv')){
            $cv = $request->file('cv');
            $input['cvname'] = 'site/work/apply_for_jobs_cv/'.time().'.'.$cv->getClientOriginalExtension();
            $destinationPath = public_path('site/work/apply_for_jobs_cv');
            $cv->move($destinationPath,$input['cvname']);
            $cv = $input['cvname'];
        }

        Apply_for_job::create([
          'job_id' => $request->job_id,
          'user_id' => Auth::user()->id,
          'link' => $request->link,
          'offer' => $request->offer,
          'cv' => $cv
        ]);

        return redirect()->back()->with('info','تم ارسال طلبك للوظيفة بنجاح');
    }

}
