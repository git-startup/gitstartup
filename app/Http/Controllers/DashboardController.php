<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Mvp;
use App\Status;
use App\Message;
use App\Tickets;
use App\Tickets_type;
use App\Category;
use App\Articles;
use App\Mvp_type;
use App\Mvp_rating;
use App\Can_work_on;
use App\PaymentMethod;
use App\Payment_archive;
use App\Recharge;
use App\Work;
use App\Hiring;
use App\Apply_for_job;
use App\Advertising;
use Mail;
use App\Mail\NotifyUsersForNewArticle;
use App\Mail\AdminNotifyUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
     // this function is to get the main page in admin panel
    public function getIndex()
    {
        $users_count = User::get()->count();

        $status_count = Status::get()->count();

        $mvps_count = Mvp::get()->count();

        $work_request_count = Work::get()->count();


        return view('dashboard.index')
                ->with('users_count',$users_count)
                ->with('mvps_count',$mvps_count)
                ->with('work_request_count',$work_request_count)
                ->with('status_count',$status_count);

    }
     // to get the users page
    public function getUsers(Request $request){
        $users = User::orderBy('id', 'DESC')->get();
        $can_work_on = Mvp_type::where('is_active',1)->orderBy('id', 'DESC')->get();
        return view('dashboard.users')
                ->with('users',$users)
                ->with('can_work_on',$can_work_on);
    }

    public function postUsers(Request $request){

      if($request->has('btn_disable')){
          $user_id = $request->input('user_id');
          User::where('id',$user_id)->update(array('is_disable' => 1));
          return redirect()->back()->with('info' , 'تم تعطيل الحساب');
      }
      elseif($request->has('btn_able')){
          $user_id = $request->input('user_id');
          User::where('id',$user_id)->update(array('is_disable' => 0));
          return redirect()->back()->with('info' , 'تم تفعيل الحساب');
      }


      $can_work_on = json_encode($request->can_work_on,JSON_UNESCAPED_UNICODE);

      Can_work_on::where('user_id',$request->user_id)
        ->update([
          'name' => $can_work_on
        ]);

      return redirect()->back()->with('info','تم تحديث البيانات بنجاح');
    }

    // register new developer
    public function getAdd_user(Request $request){
        return view('dashboard.add_user');
    }

    public function postAdd_user(Request $request){
        $this->validate($request,[
            'username'   => 'required|unique:users|string',
            'email'      => 'required|unique:users|email|max:255',
            'name'       => 'required|string',
            'phone'      => 'required|string|max:15',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        if($request->input('gender') == 'male'){
            $avatar = asset('site/profile/logo/avatar.png');
        }elseif($request->input('gender') == 'female'){
            $avatar = asset('site/profile/logo/avatar2.png');
        }


        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'type' => $request->type,
            'image'    => $avatar,
            'password' => Hash::make($request->password),
        ]);

        Can_work_on::create([
          'user_id' => $user->id
        ]);

        return redirect()->back()->with('info','تم اضافة مستخدم بنجاح');
    }

    // to get the projects page
    public function getMvp(Request $request){
        $mvps = Mvp::where('is_deleted',0)->orderBy('id', 'DESC')->get();
        return view('dashboard.mvp')
                ->with('mvps',$mvps);
    }

    public function postMvp(Request $request){

      if($request->has('delete_mvp')){
          Mvp::where('id','=',$request->mvp_id)->update([
            'is_deleted' => 1
          ]);
          return redirect()->back()->with('info','تم حذف النموذج');
      }
      // to approve the mvp
      if($request->has('approved')){
          Mvp::where('id','=',$request->mvp_id)->update(['is_approved' => 1]);
          return redirect()->back()->with('info','تمت الموافقة على النموذج');
      }
      elseif($request->has('reject')){
          Mvp::where('id','=',$request->mvp_id)->update(['is_approved' => 0]);
          return redirect()->back()->with('info','تم رفض النموذج');
      }

    }

    // manage mvp type
    public function getAdd_mvp_type(){
      return view('dashboard.add_mvp_type');
    }
    public function postAdd_mvp_type(Request $request){
      $this->validate($request,[
        'name' => 'required|string',
        'slug' => 'required|string|unique:mvp_type',
      ]);
      Mvp_type::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'is_active' => 1
      ]);
      return redirect()->back()->with('info','تمت اضافة النوع بنجاح');
    }
    public function getMvp_type(){
      $type = Mvp_type::orderBy('id', 'DESC')->get();
      return view('dashboard.mvp_type')->with('type',$type);
    }
    public function postMvp_type(Request $request){
      if($request->has('delete_type')){
        Mvp_type::where('id',$request->type_id)->delete();
        return redirect()->back()->with('info','تم حذف النوع بنجاح');
      }
      if($request->has('active')){
        Mvp_type::where('id',$request->type_id)->update([
          'is_active' => 1
        ]);
        return redirect()->back()->with('info','تم تفعيل النوع بنجاح');
      }
      if($request->has('disactive')){
        Mvp_type::where('id',$request->type_id)->update([
          'is_active' => 0
        ]);
        return redirect()->back()->with('info','تم تعطيل النوع بنجاح');
      }
    }

    // to get users posts
     public function getStatus(Request $request){

         if($request->has('delete_status')){
             Status::where('id','=',$request->input('status_id'))->update([
               'is_deleted' => 1
             ]);
             return redirect()->back()->with('info','تم حذف المنشور بنجاح');

         }
         // to get all status and posts
        $status = Status::orderBy('created_at','desc')->where('is_deleted', 0)->get();

         return view('dashboard.status')
                ->with('status',$status);

     }

     // to publish new article
	public function getPublishArticle(){
		$category = Category::where('is_active',1)->get();
		return view('dashboard.publish_article')
					->with('category',$category);
	}
	public function postPublishArticle(Request $request){

  		$this->validate($request,[
  			'heading' 		 => 'required|string',
  			'slug'	  		 => 'required|string|unique:articles',
  			'content' 		 => 'required|string',
  			'image'   		 => 'required|image|mimes:jpg,png,jpeg,svg',
  			'bottom_image'   => 'image|mimes:jpg,png,jpeg,svg' 
  		]);

  		$newArticle['heading']        = $request->heading;
  		$newArticle['sub_heading']    = $request->sub_heading;
  		$newArticle['slug']    		  = $request->slug;
  		$newArticle['content'] 		  = $request->content;
  		$newArticle['bottom_content'] = $request->bottom_content;
  		$newArticle['category_id']    = $request->category_id;
  		$newArticle['language']       = $request->language;
      $newArticle['user_id']        = Auth::user()->id;
      $newArticle['is_deleted']     = 0;

      // to upload article image
      if($request->hasFile('image')){
      	$image = $request->file('image');
        $imageUrl = 'site/articles/'.time().'.'.'main_image'.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/site/articles');
        $image->move($destinationPath,$imageUrl);
        $image = $imageUrl;

        $newArticle['image'] = $image;
      }
      // to upload bottom image
      if($request->hasFile('bottom_image')){
      	$image = $request->file('bottom_image');
        $imageUrl = 'site/articles/'.time().'.'.'sub_image'.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/site/articles');
        $image->move($destinationPath,$imageUrl);
        $bottom_image = $imageUrl;

        $newArticle['bottom_image'] = $bottom_image;
      }else{
        $newArticle['bottom_image'] = '';
      }

      $newArticle = Articles::create($newArticle);

      //Notify all users about the new article
      try {
        foreach (User::get() as $user) {
            Mail::to($user->email)->queue(new NotifyUsersForNewArticle($newArticle, $user));
        }
      } catch (\Exception $e) {
          //return false;
      }


      return redirect()->back()->with('info','تم نشر المقالة');
	}
	// to list all published articles
	public function getArticles(){
		$articles = Articles::OrderBy('created_at','desc')->where('is_deleted','<>',1)->get();
		return view('dashboard.articles')
					->with('articles',$articles);

	}
	public function postArticles(Request $request){
		if($request->has('btn_update')){
      $category = Category::where('is_active',1)->orderBy('id', 'DESC')->get();
			$article = Articles::where('id',$request->article_id)->first();
			return view('dashboard.edit_article')
						->with('article',$article)
            ->with('category',$category);
		}
		if($request->has('update_article')){
			$this->validate($request,[
				'heading'        => 'required|string',
				'content'        => 'required|string'
			]);

	     // to upload article image
      if($request->hasFile('image')){
      	$image = $request->file('image');
        $imageUrl = 'site/articles/'.time().'.'.'main_image'.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/site/articles');
        $image->move($destinationPath,$imageUrl);
      }else{
      	$article_info = Articles::where('id',$request->article_id)->first();
      	$imageUrl = $article_info->image;
      }

      // to upload article bottom image
      if($request->hasFile('bottom_image')){
      	$image = $request->file('bottom_image');
        $imageUrl = 'site/articles/'.time().'.'.'sub_image'.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/site/articles');
        $image->move($destinationPath,$imageUrl);
        $bottomImageUrl = $imageUrl;
      }else{
      	$article_info = Articles::where('id',$request->article_id)->first();
      	$bottomImageUrl = $article_info->bottom_image;
      }

			Articles::where('id',$request->article_id)->update([
				'heading' 	     => $request->heading,
				'sub_heading'    => $request->sub_heading,
				'content' 	     => $request->content,
				'bottom_content' => $request->bottom_content,
				'category_id'    => $request->category_id,
				'language' 	     => $request->language,
				'image'          => $imageUrl,
				'bottom_image'   => $bottomImageUrl
			]);

			return redirect()->back()->with('info','تم تحديث بيانات المقالة');

		}
		if($request->has('delete_article')){
			Articles::where('id',$request->article_id)->update([
        'is_deleted' => 1
      ]);
			return redirect()->back()->with('info','تم حذف المقالة');
		}
		if($request->has('publish_btn')){
			Articles::where('id',$request->article_id)->update([
				'is_published' => 1
			]);
			return redirect()->back()->with('info','تم نشر المقالة');
		}
		if($request->has('dis_publish_btn')){
			Articles::where('id',$request->article_id)->update([
				'is_published' => 0
			]);
			return redirect()->back()->with('info','تم تعليق نشر المقالة');
		}
	}

    // to manage articles category's
    public function getAddCategory(){
        return view('dashboard.addCategory');
    }
    public function postAddCategory(Request $request){
        $this->validate($request,[
            'name' => 'string|required',
            'slug' => 'string|required'
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->back()->with('info','تمت اضافة التصنيف');
    }

    // to get all articles category
    public function getCategory(){
        $category = Category::orderBy('id', 'DESC')->get();
        return view('dashboard.category')
                ->with('category',$category);
    }
    public function postCategory(Request $request){
        if($request->has('delete_category')){
            Category::where('id',$request->category_id)->delete();
            return redirect()->back()->with('info','تم حذف التصنيف');
        }
    }

    // admin send messages controller
    public function sendMessage(Request $request){

      $this->validate($request,[
          'subject' => 'required|string',
          'message' => 'required|string'
      ]);


      if($request->all_users != null){
        $users = User::where('is_deleted',0)->where('is_disable',0)->orderBy('id', 'DESC')->get();
      }
      elseif($request->developers != null){
        $users = User::where('type',2)
                    ->where('is_deleted',0)->where('is_disable',0)->orderBy('id', 'DESC')->get();
      }
      elseif($request->project_owner != null){
        $users = User::where('type',1)
                    ->where('is_deleted',0)->where('is_disable',0)->orderBy('id', 'DESC')->get();
      }

      elseif($request->username != null){
        $users = User::where('username',$request->username)
                    ->where('is_deleted',0)->where('is_disable',0)->orderBy('id', 'DESC')->get();
      }

      $message['subject'] = $request->subject;
      $message['message'] = $request->message;


      foreach ($users as $user) {
          Mail::to($user->email)->queue(new AdminNotifyUser($message,$user));
      }

      return redirect()->back()->with('info','تم ارسال الرسالة بنجاح');

    }

	// for settings
     public function getSettings(){
         $settings = DB::table('settings')->first();
         return view('dashboard.settings')
                ->with('settings',$settings);
     }

     public function getTickets(Request $request){

        if($request->has('delete_ticket')){
            Tickets::where('id','=',$request->ticket_id)->update([
              'is_deleted' => 1
            ]);
            return redirect()->back()->with('info','تم حذف التذكرة بنجاح');
        }

        if($request->has('close_ticket')){
            Tickets::where('id',$request->ticket_id)->update([
                'is_closed' => 1
            ]);
            return redirect()->back()->with('info','تم اغلاق التذكرة');
        }

        $tickets = Tickets::where('is_deleted', '<>', 1)->get();

        return view('dashboard.tickets')
            ->with('tickets',$tickets);
     }

     public function getTicketsTypes(){
       $tickets_types = Tickets_type::where('is_deleted',0)->orderBy('id', 'DESC')->get();
       return view('dashboard.tickets_types')->with('tickets_types',$tickets_types);
     }

     public function postTickets(Request $request){

       if($request->has('delete_type')){
         Tickets_type::where('id',$request->type_id)->delete();
         return redirect()->back()->with('info','تم حذف النوع بنجاح');
       }

       if($request->has('is_active')){
         Tickets_type::where('id',$request->type_id)->update([
           'is_active' => $request->is_active
         ]);
         return redirect()->back()->with('info','تم تحديث حالة النوع');
       }

       $this->validate($request,[
         'name' => 'string|required'
       ]);

       Tickets_type::create([
         'name' => $request->name,
         'is_active' => 1
       ]);

       return redirect()->back()->with('info','تم اضافة نوع التذكرة بنجاح');
     }


     // manage payment
    public function getWork_list(){
       $work_list = Work::where('is_deleted', 0)->orderBy('id', 'DESC')->get();
       return view('dashboard.work_list')
                 ->with('work_list',$work_list);
     }
     public function postWork_list(Request $request){
       if($request->has('action')){
         if($request->action == 'is_payed'){

           $project_owner = User::find($request->user_id);
           $worker = User::find($request->worker_id);
           $sallery = $request->sallery;

           // transform the mony from project_owner account to worker account
           if($project_owner->work_total >= $sallery){
             // take the project cost from the project owner account (work_total)
             $project_owner_total = $project_owner->work_total - $sallery;
             // take 5% from worker sallery to ower paltform
             $site_commission =  $sallery * (5/100);
             $worker_total = $worker->total + ($sallery - $site_commission);

             // update the project_owner account (work_total) after taking the project cost
             User::where('id',$project_owner->id)->update([
               'work_total' => $project_owner_total
             ]);

             // update worker account (total) after adding the project cost
             User::where('id',$worker->id)->update([
               'total' => $worker_total
             ]);

             // archive payment action
             $action = 'تحويل';
             $work_total = $sallery - $site_commission;
             Payment_archive::create([
               'action' => $action,
               'total' => $work_total,
               'from' => $project_owner->id,
               'to' => $worker->id,
               'commission' => $site_commission
             ]);

             // update the work agremment to is_payed
             Work::where('id',$request->work_id)->update(['is_payed' => 1]);

             return redirect()->back()->with('info',' تم تأكيد عملية الدفع بنجاح  ');

           }else return redirect()->back()->with('info','لا يوجد رصيد كافي في حساب صاحب المشروع');

         }
         elseif($request->action == 'delete'){
           Work::where('id',$request->work_id)->update(['is_deleted' => 1]);
           return redirect()->back()->with('info','تم حذف طلب العمل   ');
         }
       }
       return redirect()->back()->with('info','قم باختيار عملية اولا');
     }

     // add new payment method
     public function getPaymentMethod(){
       return view('dashboard.paymentMethod');
     }

     public function postPaymentMethod(Request $request){
       if($request->has('add_btn')){
         if($request->hasFile('logo')){
             $image = $request->file('logo');
             $input['imagename'] = 'site/mvp/bill/logo/'.time().'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('site/mvp/bill/logo');
             $image->move($destinationPath,$input['imagename']);
             $method_logo = $input['imagename'];
          }else $method_logo = '';

         PaymentMethod::create([
           'name' => $request->name,
           'bio' => $request->bio,
           'logo' => $method_logo,
         ]);
         return redirect()->back()->with('info','تم اضافة طريقة الدفع بنجاح ');
       }
     }

     public function getPaymentMethodTable(){
       $paymentMethod = PaymentMethod::orderBy('id', 'DESC')->get();
       return view('dashboard.paymentMethodTable')
                   ->with('paymentMethod',$paymentMethod);
     }

     public function postPaymentMethodTable(Request $request){
       if($request->has('delete_btn')){
         PaymentMethod::where('id',$request->id)->delete();
         return redirect()->back()->with('info',' تم حذف العنوان بنجاح  ');
       }
       if($request->has('update_btn')){
         PaymentMethod::where('id',$request->id)->update([
           'name' => $request->name,
           'branch' => $request->branch,
           'Method' => $request->Method,
           'account_number' => $request->account_number
         ]);
         return redirect()->back()->with('info',' تم تحديث العنوان بنجاح  ');
       }
     }

     // manage recharge table
     public function getRecharge(){
       $accounts = Recharge::where('is_deleted',0)->orderBy('id', 'DESC')->get();
       return view('dashboard.recharge')->with('accounts',$accounts);
     }

     public function postRecharge(Request $request){
       if($request->has('delete_recharge')){
         Recharge::where('id',$request->recharge_id)->update([
           'is_deleted' => 1
         ]);
         return redirect()->back()->with('info','تم الحذف بنجاح');
       }

       if($request->has('recharge_btn')){
         User::where('id',$request->user_id)->update([
           'total' => $request->total,
         ]);

         // archive payment action
         $action = 'شحن';
         Payment_archive::create([
           'action' => $action,
           'total' => $request->total,
           'to' => $request->user_id,
           'commission' => 0
         ]);

         Recharge::where('id',$request->recharge_id)->update([
           'is_recharged' => 1
         ]);

         return redirect()->back()->with('info','تم شحن الحساب بنجاح ');
       }
     }

     // manage draw from accounts
     public function get_deposit_draw(){
       $users = User::where('is_deleted',0)->where('total','>',0)->orderBy('id', 'DESC')->get();
       return view('dashboard.deposit_draw')->with('users',$users);
     }

     public function post_deposit_draw(Request $request){

       if($request->has('deposit_btn')){
         $user_total = User::find($request->user_id)->total;
         if($request->total > 0){
           $total = $user_total + $request->total;
           User::where('id',$request->user_id)->update([
             'total' => $total
           ]);
           // archive payment action
           $action = 'ايداع';
           Payment_archive::create([
             'action' => $action,
             'total' => $request->total,
             'to' => $request->user_id,
             'commission' => 0
           ]);
            return redirect()->back()->with('info','تم ايداع المبلغ في الحساب');
         }
         else{
            return redirect()->back()->with('info','المبلغ المدخل غير صحيح');
         }
       }

       if($request->has('draw_btn')){
         $user_total = User::find($request->user_id)->total;
         if($user_total > $request->total){
           $total = $user_total - $request->total;
           User::where('id',$request->user_id)->update([
             'total' => $total
           ]);
           // archive payment action
           $action = 'سحب';
           Payment_archive::create([
             'action' => $action,
             'total' => $request->total,
             'from' => $request->user_id,
             'commission' => 0
           ]);
            return redirect()->back()->with('info','تم خصم المبلغ بنجاح');
         }
         else{
            return redirect()->back()->with('info','المبلغ المدخل اكبر من المتوفر في الحساب');
         }
       }
     }

     // manage payment_archive
     public function getPayment_archives(){
       $payment_archives = Payment_archive::where('is_deleted',0)->orderBy('id', 'DESC')->get();
       return view('dashboard.payment_archives')
              ->with('payment_archives',$payment_archives);
     }

     public function postPayment_archives(Request $request){
       if($request->has('delete_archive')){
         Payment_archive::where('id',$request->id)->update([
           'is_deleted' => 1
         ]);
         return redirect()->back()->with('info','تم حذف ارشيف الدفع');
       }
     }

     // manage hiring request
     public function getHiring_request(){
       $hiring_request = Hiring::where('is_deleted',0)->orderBy('id', 'DESC')->get();
       return view('dashboard.hiring_request')
              ->with('hiring_request',$hiring_request);
     }
     public function postHiring_request(Request $request){
       if($request->has('approve_btn')){
         Hiring::where('id',$request->id)->update([
           'is_approved' => 1
         ]);
         return redirect()->back()->with('info','تمت الموافقة على طلب التوظيف');
       }
       if($request->has('dis_approve_btn')){
         Hiring::where('id',$request->id)->update([
           'is_approved' => 0
         ]);
         return redirect()->back()->with('info','تم حجب طلب التوظيف بنجاح');
       }
       if($request->has('delete_btn')){
         Hiring::where('id',$request->id)->update([
           'is_deleted' => 1
         ]);
         return redirect()->back()->with('info','تم حذف طلب التوظيف');
       }
       if($request->has('close_btn')){
         Hiring::where('id',$request->id)->update([
           'is_closed' => 1
         ]);
         return redirect()->back()->with('info','تم اغلاق طلب التوظيف');
       }
     }

     // manage users applications for jobs
     public function getApply_fo_jobs(){
       $applications = Apply_for_job::where('is_deleted',0)->orderBy('id', 'DESC')->get();
       return view('dashboard.apply_for_jobs')->with('applications',$applications);
     }
     public function postApply_fo_jobs(Request $request){
       if($request->has('delete_btn')){
         Apply_for_job::where('id',$request->application_id)->update([
           'is_deleted' => 1
         ]);
         return redirect()->back()->with('info','تم حذف الطلب بنجاح');
       }
     }

     // manage advertising table
     public function getAdvertising(){
       return view('dashboard.advertising');
     }
     public function postAdvertising(Request $request){
       if($request->has('add_advertising')){
         $this->validate($request,[
           'title' => 'required|string',
           'link' => 'required|string',
           'image' => 'required|image|mimes:jpeg,jpg,gif,svg,png|max:5120',
         ]);

         if($request->hasFile('image')){
             $image = $request->file('image');
             $input['imagename'] = 'site/advertising/images/'.time().'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('site/advertising/images');
             $image->move($destinationPath,$input['imagename']);

             $advertising_image = $input['imagename'];
         }

         Advertising::create([
           'title' => $request->title,
           'link' => $request->link,
           'image' => $advertising_image
         ]);

         return redirect()->back()->with('info','تمت اضافة الاعلان بنجاح');
       }
       if($request->has('delete_advertising')){
         Advertising::where('id',$request->advertising_id)->update([
           'is_deleted' => 1
         ]);
         return redirect()->back()->with('info','تم حذف الاعلان بنجاح');
       }
     }
     public function getAdvertisingTable(){
       $advertisings = Advertising::where('is_deleted',0)->orderBy('id', 'DESC')->get();
       return view('dashboard.advertising_table')->with('advertisings',$advertisings);
     }


}
