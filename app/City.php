<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = ['county', 'zip_code', 'name'];

    protected $dates = ['deleted_at'];

    public function county() {
        return $this->hasOne(County::class, 'id', 'county');
    }
}
