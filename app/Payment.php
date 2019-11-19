<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = ['partner_id', 'type', 'payment_method', 'amount'];

    protected $dates = ['deleted_at'];
}
