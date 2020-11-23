<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Can_work_on extends Model
{
   protected  $table = 'can_work_on';
   protected $fillable = [
     'user_id',
     'name'
   ];

   public function user(){
       return $this->belongsTo(User::class,'user_id');
   }
}
