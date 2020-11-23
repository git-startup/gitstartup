<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply_for_job extends Model
{
    protected $table = 'apply_for_jobs';
    protected $fillable = [
      'link',
      'job_id',
      'user_id',
      'offer',
      'cv',
      'is_deleted'
    ];

    public function user(){
      return $this->belongsTo(User::class,'user_id');
    }

    public function hiring(){
      return $this->belongsTo(Hiring::class,'job_id');
    }
}
