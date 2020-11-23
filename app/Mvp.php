<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mvp extends Model
{
    protected $table = 'mvp';
    protected $fillable = [
    	'user_id',
    	'name',
    	'type',
    	'description',
    	'slug',
    	'dev_tools',
    	'mvp_link',
    	'is_approved',
    	'is_available',
      'is_deleted'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function images(){
      return $this->hasMany(Mvp_images::class,'mvp_id');
    }


    public function rating(){
      return $this->hasMany(Mvp_rating::class,'mvp_id');
    }
}
