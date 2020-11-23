<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
  protected $table = "tickets";
	protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
 
