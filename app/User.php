<?php

namespace App;

use App\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role',
        'phone',
        'gender',
        'location',
        'type',
        'total',
        'work_total',
        'image',
        'description',
        'skills',
        'is_disable',
        'is_completed',
        'is_deleted'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     // to get the username
    public function getUsername(){
        return $this->username;
    }

    // function to get the user fullname
    public function getname(){
        return $this->name;
    }

    // function to get the user phone
    public function getPhone(){
        return $this->phone;
    }

    // function to get user avatar
    public function getAvatar(){
        return $this->user_image;
    }

    // function to get user gender
    public function getGender(){
        return $this->gender;
    }

    // for user profile model
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    // for articals table
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // for tickets table
    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

    // so user can make a new status
    public function statuses(){
        return $this->hasMany(Status::class,'user_id');
    }

    //for mvp table
    public function mvps(){
        return $this->hasMany(Mvp::class,'user_id');
    }

    //for mvp table
    public function mvp_rating(){
        return $this->hasOne(Mvp::class,'user_id');
    }

    // for job apply table
    public function job_application()
    {
        return $this->hasMany(Apply_for_job::class,'user_id');
    }


    // for mvp report table
    public function report(){
        return $this->hasMany(MvpReport::class,'user_id');
    }

    // for massanger table
    public function Messenger(){
        return $this->hasMany(Message::class,'from');
    }

    // this method for can_work_on table
    public function can_work_on(){
        return $this->hasMany(Can_work_on::class,'user_id');
    }

    // for like model
    public function likes(){
        return $this->hasMany(Like::class,'user_id');
    }
    // to cheack if the user already like this status
    public function hasLikedStatus(Status $status){
        return (bool) $status->likes()->where('user_id',$this->id)->count();
    }


    // for recharge table
    public function recharge()
    {
        return $this->hasMany(Recharge::class);
    }

    public function workersOfMine(){
        return $this->belongsToMany(User::class,'work_list','user_id','worker_id');
    }

    public function workersOf(){
        return $this->belongsToMany(User::class,'work_list','worker_id','user_id');
    }

    public function workers(){
        return $this->workersOfMine()->wherePivot('is_deleted',false)->get()->merge($this->workersOf()->wherePivot('is_deleted',false)->get());
    }

}
