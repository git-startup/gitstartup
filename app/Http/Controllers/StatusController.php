<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Comment;
use App\User;
use Auth;


class StatusController extends Controller
{
    public function getStatus(){

        $statuses = Status::where('is_published',1)
                          ->where('is_deleted',0)
                          ->with('comments')
                          ->with('user')
                          ->orderBy('created_at','desc')
                          ->orderBy('id', 'DESC')->get();


        return response()->json($statuses);
    }


 	  public function postStatus(Request $request){

      if($request->has('edit_status')){
        $this->validate($request,[
           'status' => 'required|string|min:25|max:250',
        ]);
        Status::where('id',$request->status_id)->update([
          'body' => $request->status
        ]);

        return redirect()->back()->with('info','تم تحديث الاستفسار بنجاح');
      }

      if($request->has('delete_status')){
          $status_id = $request->input('status_id');
          Status::where('id',$status_id)->update([
            'is_deleted' => 1
          ]);
          return redirect()->back()->with('info','تم حذف الاستفسار بنجاح');
      }

      // to post new status
      $this->validate($request,[
         'status' => 'required|string|min:25|max:250',
      ],[
          'required' => 'رجاءا قم بكتابة البوست اولا',
      ]);

      $status = Auth::user()->statuses()->create([
         'body'          => $request->status,
         'type'          => 'status',
         'is_deleted'    => 0
      ]);

      return response()->json($status);

    }


    public function get_status_with_user($status_id){
      $status = Status::where('id',$status_id)->with('user')->first();
      return response()->json($status);
    }

    public function postComment(Request $request){

      $this->validate($request,[
         'content' => 'required|string|min:3|max:150',
      ]);

      $comment = Comment::create([
          'status_id' => $request->status_id,
          'content'    => $request->content,
          'user_id'    => Auth::user()->id,
          'is_deleted' => 0

      ]); 

        $comment = Comment::where('id',$comment->id)->with('user')->first();
        return response()->json($comment);
    }


    public function getLike($statusId){

        $status = Status::find($statusId);

        if(!$statusId){
           return response()->json([
             'error' => 'true',
             'message' => 'لا توجد حالة مشابهة'
           ]);
        }

        if(Auth::user()->hasLikedStatus($status)){
            echo $status->likes()->count() . ' likes';
            dd();
        }

        $like = $status->likes()->create([]);
        Auth::user()->likes()->save($like);

        Status::where('id','=',$statusId)->update([
          'likes' => $status->likes()->count()
        ]);

        return response()->json($status->likes()->count());


    }
}
