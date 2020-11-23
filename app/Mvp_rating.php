<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mvp_rating extends Model
{
    protected $table = 'mvp_ratings';
    protected $fillable = [
      'mvp_id',
      'user_id',
      'stars_for_design',
      'stars_for_functionality',
      'stars_for_performance',
      'rating',
      'is_deleted'
    ];

    public function mvp(){
      return $this->belongsTo(Mvp::class,'mvp_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
