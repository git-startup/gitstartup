<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_archive extends Model
{
    protected $table = 'payment_archives';
    protected $fillable = [
      'action',
      'from',
      'to',
      'commission',
      'total',
      'is_deleted'
    ];
}
