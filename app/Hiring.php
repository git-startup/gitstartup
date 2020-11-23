<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hiring extends Model
{
    protected $table = 'hirings';
    protected $fillable = [
      'job_title',
      'sallary',
      'job_description',
      'job_qualifications',
      'phone',
      'email',
      'is_approved',
      'is_closed',
      'is_deleted'
    ];

    public function applications(){
      return $this->hasMany(Apply_for_job::class,'job_id');
    }
}
