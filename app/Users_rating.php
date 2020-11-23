<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_rating extends Model
{
    protected $table = "users_ratings";
    protected $fillable = [
      'user_id',
      'reviewer_id',
      'stars',
      'rating',
      'is_deleted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
