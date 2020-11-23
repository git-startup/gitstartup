<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets_type extends Model
{
    protected $table = 'tickets_types';
    protected $fillable = [
      'name',
      'is_active',
      'is_deleted'
    ];
}
