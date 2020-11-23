<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mvp;
use App\Mvp_type;
use App\Tickets_type;
use App\PaymentMethod;
use App\User;
use App\Mvp_images;
use App\Mvp_rating;
use Illuminate\Support\Facades\File;

class MvpController extends Controller{

	// to get add mvp page
	public function getAdd(){
			$users = User::where('is_deleted',0)->where('is_disable',0)->orderBy('id', 'DESC')->get();
			$mvp_types = Mvp_type::where('is_active',1)->orderBy('id', 'DESC')->get();
			$tickets_type = Tickets_type::where('is_active',1)
													->where('is_deleted',0)->orderBy('id', 'DESC')->get();
			$payment_methods = PaymentMethod::orderBy('id', 'DESC')->get();

      return view('mvp.add')
			 				->with('users',$users)
							->with('mvp_types',$mvp_types)
							->with('tickets_type',$tickets_type)
							->with('payment_methods',$payment_methods);
    }
    // to add mvp
    public function postAdd(Request $request){

    	$this->validate($request,[
            'name'            => 'required|min:3|max:25|string',
            'type'            => 'required|string',
            'description'     => 'required|min:50|max:250|string',
            'slug'            => 'required|string|unique:mvp',
            'mvp_link'        => 'required|url',
            'dev_tools'       => 'required|string|max:250|min:50'
        ],[
            'required'  => 'رجاءا قم بملئ هذا الحقل اولا',
            'string'    => 'هذا الحقل يجب ان يحتوي على بيانات نصية',
            'max'       => 'حجم الملف اكبر من حجم الملف المسموح به في هذا الحقل',
            'mimes'     => 'نوع الملف غير مسموح به',
						'url'       => 'الرجاء ادخال رابط صحيح'
        ]);

        $mvp = Auth::user()->mvps()->create([
            'name'        => $request->name,
            'type'        => $request->type,
            'description' => $request->description,
            'slug'        => $request->slug,
            'dev_tools'   => $request->dev_tools,
            'mvp_link'    => $request->mvp_link,
            'is_approved' => 0,
            'is_deleted'  => 0
        ]);

			$tickets_type = Tickets_type::where('is_active',1)
													->where('is_deleted',0)->orderBy('id', 'DESC')->get();
			$payment_methods = PaymentMethod::orderBy('id', 'DESC')->get();

	    return view('mvp.index',['slug' => $request->slug])
								->with('mvp',$mvp)
								->with('tickets_type',$tickets_type)
								->with('payment_methods',$payment_methods);
	}

	// to get single mvp
	public function getMvp($slug){
		$mvp = Mvp::where('slug',$slug)
							->where('is_approved',1)
							->where('is_available',1)
							->where('is_deleted',0)
							->with('images')->first();
		$tickets_type = Tickets_type::where('is_active',1)
												->where('is_deleted',0)->orderBy('id', 'DESC')->get();
		$payment_methods = PaymentMethod::get();


		if($mvp){
				return view('mvp.index')
								->with('mvp',$mvp)
								->with('tickets_type',$tickets_type)
								->with('payment_methods',$payment_methods);
		}else{
			return view('errors.404');
		}
 	}

	public function postMvp(Request $request){
		if($request->has('mvp_rating_btn')){
			$this->validate($request,[
				'stars_for_design' => 'integer|required',
				'stars_for_functionality' => 'integer|required',
				'stars_for_performance' => 'integer|required',
				'rating' => 'string|required',
			]);

			if($request->stars_for_design < 1 OR $request->stars_for_design > 5
			OR $request->stars_for_performance < 1 OR $request->stars_for_performance > 5
			OR $request->stars_for_functionality < 1 OR $request->stars_for_functionality > 5){
				return redirect()->back()->with('info','الرجاء ادخال عدد صحيح من النجوم');
			}

			// to prevent more than on rating for user
			$check = Mvp_rating::where('user_id',Auth::user()->id)
														->where('mvp_id',$request->mvp_id)
														->where('is_deleted',0)->count();
			if($check > 0){
				return redirect()->back()->with('info',' لقد قمت بتقييم هذا المشروع سلفا');
			}

			Mvp_rating::create([
				'mvp_id' => $request->mvp_id,
				'user_id' => Auth::user()->id,
				'stars_for_design' => $request->stars_for_design,
				'stars_for_performance' => $request->stars_for_performance,
				'stars_for_functionality' => $request->stars_for_functionality,
				'rating' => $request->rating
			]);

			return redirect()->back()->with('info','تمت اضافة التقييم بنجاح');
		}

		if($request->has('delete_rating')){
			Mvp_rating::where('id',$request->rating_id)->update([
				'is_deleted' => 1
			]);
			return redirect()->back()->with('info','تم حذف التقييم بنجاح');
		}

		if($request->has('mvp_not_available')){
				Mvp::where('id',$request->mvp_id)->update(['is_available' => 0]);
				return redirect()->back()->with('info','تم تعطيل عرض النموذج');
		}
		if($request->has('mvp_is_available')){
				Mvp::where('id',$request->mvp_id)->update(['is_available' => 1]);
				return redirect()->back()->with('info','تم تفعيل عرض النموذج ');
		}

		if($request->has('delete_mvp')){
				Mvp::where('id',$request->mvp_id)->update([
					'is_deleted' => 1
				]);
			return redirect()->back()->with('info','تم حذف نموذج العمل بنجاح ');
		}


	}
    // to get edit mvp page
    public function getEditMvp($slug){
        $mvp = Mvp::where('slug',$slug)->first();
				$mvp_type = Mvp_type::where('is_active',1)->get();
				$tickets_type = Tickets_type::where('is_active',1)
                            ->where('is_deleted',0)->orderBy('id', 'DESC')->get();
				$payment_methods = PaymentMethod::get();

        if($mvp->count() > 0){
					return view('mvp.edit')
									->with('mvp',$mvp)
									->with('mvp_type',$mvp_type)
									->with('tickets_type',$tickets_type)
									->with('payment_methods',$payment_methods);
				}else{
					return redirect()->back()->with('info','الرجاء التأكد من العنوان الصحيح');
				}
    }
    // to edit mvp data
    public function postEditMvp(Request $request,$slug){

			if($request->has('delete_mvp_image')){
				// to delete mvp image
				$check_if_last_one = Mvp_images::where('mvp_id',$request->mvp_id)->count();
				if($check_if_last_one == 1){
					return redirect()->back()->with('info','نموذج العمل يجب ان يحتوي على صورة واحدة كأقل تقدير');
				}
				$mvp_image = Mvp_images::find($request->mvp_image_id);
				File::delete('site/mvp/images/'.$mvp_image->url);
				Mvp_images::where('id',$request->mvp_image_id)->delete();
				return redirect()->back()->with('info','تم حذف الصورة بنجاح');
			}
	    if($request->has('btn_edit_mvp')){
				$this->validate($request,[
						'name'            => 'required|string',
						'type'            => 'required|string',
						'description'     => 'required|string',
						'mvp_link'        => 'required|url',
						'dev_tools'       => 'required|string'
				],[
						'required'  => 'رجاءا قم بملئ هذا الحقل اولا',
						'string'    => 'هذا الحقل يجب ان يحتوي على بيانات نصية',
						'max'       => 'حجم الملف اكبر من حجم الملف المسموح به في هذا الحقل',
						'mimes'     => 'نوع الملف غير مسموح به',
						'url'       => 'الرجاء ادخال رابط صحيح'
				]);

        Mvp::where('id',$request->mvp_id)->update([
          'name'           => $request->input('name'),
          'type'           => $request->input('type'),
          'description'    => $request->input('description'),
          'dev_tools'      => $request->input('dev_tools'),
          'mvp_link'       => $request->mvp_link,
					'is_approved'    => 0
        ]);

        return redirect()
            ->back()
            ->with('info','تم تحديث بيانات المشروع , سيتم التأكد من موافقة البيانات الجديدة لمعايير الموقع ومن ثم السماح بظهور مشروعك في الموقع ');
	    }

	}

	// list all mvps
	public function list(){
		$mvps = Mvp::orderBy('created_at','desc')
					->where('is_approved',1)
					->where('is_available',1)
					->where('is_deleted',0)->orderBy('id', 'DESC')->paginate(10);
		$mvp_type = Mvp_type::where('is_active',1)->orderBy('id', 'DESC')->get();
		$tickets_type = Tickets_type::where('is_active',1)
												->where('is_deleted',0)->orderBy('id', 'DESC')->get();
		$payment_methods = PaymentMethod::orderBy('id', 'DESC')->get();

		return view('mvp.list')
				->with('mvps',$mvps)
				->with('mvp_type',$mvp_type)
				->with('tickets_type',$tickets_type)
				->with('payment_methods',$payment_methods);
	}

	public function search($type){
		$mvps = Mvp::where('type',$type)
								->where('is_approved',1)
								->where('is_available',1)
								->where('is_deleted',0)->orderBy('id', 'DESC')->paginate(10);
		$mvp_type = Mvp_type::where('is_active',1)->orderBy('id', 'DESC')->get();
		$tickets_type = Tickets_type::where('is_active',1)
												->where('is_deleted',0)->orderBy('id', 'DESC')->get();
		$payment_methods = PaymentMethod::orderBy('id', 'DESC')->get();

		return view('mvp.list')
				->with('mvps',$mvps)
				->with('mvp_type',$mvp_type)
				->with('tickets_type',$tickets_type)
				->with('payment_methods',$payment_methods);
	}

}
