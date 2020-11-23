<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mvp_images extends Model
{
  protected $table = 'mvp_images';
  protected $fillable = [
    'mvp_id',
    'url'
  ];

  public function mvp(){
    return $this->belongsTo(Mvp::class,'mvp_id');
  }
}
