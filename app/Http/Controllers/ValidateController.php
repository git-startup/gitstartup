<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ValidateController extends Controller
{
    public function uniqueUser(Request $request){
      $validator = Validator::make($request->all(),[
         'username' => 'unique:users',
         'email' => 'unique:users'
      ]);
      if ($validator->passes()) {
        return response()->json([
          'code' => 200,
          'success'=> 'true'
        ]);
      }
      return response()->json([
        'code' => 400,
        'success' => 'false',
        'error'=>$validator->errors()->all()
      ]);
    }

    public function uniqueMvp(Request $request){
      $validator = Validator::make($request->all(),[
         'slug' => 'unique:mvp'
      ]);
      if ($validator->passes()) {
        return response()->json([
          'code' => 200,
          'success'=> 'true'
        ]);
      }
      return response()->json([
        'code' => 400,
        'success' => 'false',
        'error'=>$validator->errors()->all()
      ]);
    }

}
