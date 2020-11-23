<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    protected $table = 'recharges';
    protected $fillable = [
      'user_id',
      'bill_image',
      'is_recharged',
      'is_deleted'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
