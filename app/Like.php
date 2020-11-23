<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table ='like';
    
    public function like(){
        
        return $this->morphTo();
    }
    
    public function user(){ 
        return $this->belongsTo(User::class,'user_id');
    }
}
