<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mvp_type extends Model
{
    protected $table = 'mvp_type';
    protected $fillable = [
      'name',
      'slug',
      'is_active'
    ];
}
