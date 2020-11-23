<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'work_list';
    protected $fillable = [
    	'user_id',
    	'worker_id',
    	'accepted',
      'work_title',
      'start_of_agreement',
      'end_of_agreement',
      'sallery',
      'agreement',
      'is_completed',
      'is_payed',
      'is_rejected',
      'is_deleted'
    ];

    public function user(){
      return $this->belongsTo(User::class,'user_id');
    }


}
