<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'title', 'description', 'status', 'closed_at', 'sender_id'];

    protected $dates = ['deleted_at'];
}
