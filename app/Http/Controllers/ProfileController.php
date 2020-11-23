<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mvp;
use App\Status;
use App\Comment;
use App\Message;
use App\Work;
use App\User;
use App\Tickets_type;
use App\PaymentMethod;
use App\Users_rating;
use App\Recharge;
use App\Settings;
use Auth;

class ProfileController extends Controller
{
    public function getProfile(Request $request,$username){

        $profile = User::where('username',$username)->first();

        if(!$profile){
            return view('errors.404');
        }
        else {
            $mvps = Mvp::where('user_id',Auth::user()->id)->where('is_deleted',0)->orderBy('id', 'DESC')->get();
            $status = Status::where('user_id',Auth::user()->id)->where('is_deleted',0)->orderBy('id', 'DESC')->get();
            $comments = Comment::where('user_id',Auth::user()->id)->where('is_deleted',0)->orderBy('id', 'DESC')->get();
            $check_if_worker = Work::where('worker_id',$profile->id)
                                    ->where('user_id',Auth::user()->id)
                                    ->OrWhere('user_id',$profile->id)
                                    ->where('worker_id',Auth::user()->id)
                                    ->where('is_deleted',0)->count();
            $tickets_type = Tickets_type::where('is_active',1)
                                ->where('is_deleted',0)->orderBy('id', 'DESC')->get();
            $user_rating = Users_rating::where('is_deleted',0)->orderBy('id', 'DESC')->get();
            $payment_methods = PaymentMethod::orderBy('id', 'DESC')->get();

            $settings = Settings::first();

            return view('profile.index')
                ->with('profile',$profile)
                ->with('mvps',$mvps)
                ->with('status',$status)
                ->with('comments',$comments)
                ->with('check_if_worker',$check_if_worker)
                ->with('tickets_type',$tickets_type)
                ->with('user_rating',$user_rating)
                ->with('payment_methods',$payment_methods)
                ->with('settings',$settings);
        }

    }

    public function postProfile(Request $request,$username){

        if($request->has('delete_comment')){
            $comment_id = $request->comment_id;
            Comment::where('id',$comment_id)->update([
              'is_deleted' => 1
            ]);
            return redirect()->back()->with('info','تم حذف التعليق بنجاح ');
        }

        // post new rating
        if($request->has('user_rating')){
          $this->validate($request,[
            'stars' => 'integer',
            'rating' => 'required|string',
          ]);

          if($request->stars < 1 OR $request->stars > 5){
            return redirect()->back()->with('info','الرجاء ادخال عدد صحيح من النجوم');
          }
          // to prevent more than on rating for user
          $check = Users_rating::where('reviewer_id',Auth::user()->id)
                                ->where('is_deleted',0)
                                ->where('user_id',$request->user_id)->count();
          if($check > 0){
            return redirect()->back()->with('info',' لقد قمت بتقييم هذا المستخدم سلفا');
          }
          else{
            Users_rating::create([
              'user_id' => $request->user_id,
              'reviewer_id' => Auth::user()->id,
              'stars' => $request->stars,
              'rating' => $request->rating
            ]);
            return redirect()->back()->with('info','تمت اضافة التقييم بنجاح');
          }
        }

        // to delete rating
        if($request->has('delete_rating')){
          Users_rating::where('id',$request->rating_id)->update([
            'is_deleted' => 1
          ]);
          return redirect()->back()->with('info','تم حذف التقييم بنجاح');
        }

        // to contact with user
        if($request->has('btn_contact')){
            $this->validate($request,[
                "message" => 'required|string',
            ],[
                'required' => 'رجاءا قم بكتابة الرسالة  اولا',
            ]);
            Auth::user()->Messenger()->create([
                'message'       => $request->input('message'),
                'to'    => $request->input('to'),
            ]);
            return redirect()->back()->with('info','تم ارسال الرسالة بنجاح');
        }

        // to recharge account
        if($request->has('recharge_btn')){
          $this->validate($request,[
            'bill_image' => 'required|image|mimes:jpeg,jpg,gif,svg,png|max:5120',
          ]);

          if($request->hasFile('bill_image')){
              $image = $request->file('bill_image');
              $input['imagename'] = 'site/mvp/bill/images/'.time().'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('site/mvp/bill/images');
              $image->move($destinationPath,$input['imagename']);

              $bill_image = $input['imagename'];
          }
          else{
            return redirect()->back()->with('info','الرجاء ارفاق صورة للفتورة');
          }

          Recharge::create([
            'user_id' => Auth::user()->id,
            'bill_image' => $bill_image
          ]);

          return redirect()->back()->with('info','  تم ارسال الفاتورة بنجاح وسيتم شحن الرصيد بأسرع وقت ممكن ');
        }

        // to edit user profile information
        if($request->has('btn_edit_profile')){

            $this->validate($request ,[
                'name'          => 'required|string',
                'phone'         => 'string|required|max:15',
                'location'      => 'string|required',
                'description'   => 'string|required',
                'skills'        => 'string|required',
                'image'         => 'image|mimes:jpeg,jpg,gif,svg,png|max:5120',
            ]);


            if($request->hasFile('image')){
                $image = $request->file('image');
                $input['imagename'] = 'site/profile/logo/'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('site/profile/logo');
                $image->move($destinationPath,$input['imagename']);

                User::where('id',Auth::user()->id)->update([
                    'name'          => $request->input('name'),
                    'location'      => $request->input('location'),
                    'phone'         => $request->input('phone'),
                    'type'          => $request->input('type'),
                    'description'   => $request->input('description'),
                    'skills'        => $request->input('skills'),
                    'image'         => $input['imagename'],
                    'is_completed'  => 1
                ]);
            }else{
                User::where('id',Auth::user()->id)->update([
                    'name'          => $request->input('name'),
                    'location'      => $request->input('location'),
                    'phone'         => $request->input('phone'),
                    'type'          => $request->input('type'),
                    'description'   => $request->input('description'),
                    'skills'        => $request->input('skills'),
                    'is_completed'  => 1
                ]);
            }

            return redirect()->back()->with('info','تم تحديث البيانات بنجاح');
        }
    }

}
