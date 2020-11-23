<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = [
        'user_id',
        'body',
        'type',
        'likes',
        'is_published',
        'is_deleted'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->with('user')->orderBy('id');
    }

    public function likes(){
        return $this->morphMany(Like::class,'like');
    }
}
