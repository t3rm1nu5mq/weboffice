<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = ['filename', 'invoice_number', 'payment_id'];

    protected $dates = ['deleted_at'];
}
