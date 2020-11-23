<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mvp_images;

class Mvp_imagesController extends Controller
{
  public function store(Request $request)
  {
    // i disable csrf token protection for this controoler
      $files = $request->file('images');

      foreach ($files as $file) {
        $fileName = time().'_'. rand(1000, 9999). '.' .$file->extension();
        $file->move(public_path('site/mvp/images'),$fileName);

        Mvp_images::create([
          'mvp_id' => $_GET['mvp_id'],
          'url' => $fileName
        ]);

      }
      return response()->json(['success'=>'true']);
  }
}
