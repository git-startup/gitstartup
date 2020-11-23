<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $table = 'advertisings';
    protected $fillable = [
      'title',
      'image',
      'link',
      'is_deleted'
    ];
}
