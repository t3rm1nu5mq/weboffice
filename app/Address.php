<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = ['country', 'city', 'street', 'house', 'floor', 'door'];

    protected $dates = ['deleted_at'];

    public function city() {
        return $this->hasOne(City::class, 'id', 'city');
    }

    public function country() {
        return $this->hasOne(Country::class, 'id', 'country');
    }
}
