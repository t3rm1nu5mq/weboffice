<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'name', 'contact_user', 'email', 'phone', 'mobile', 'website', 'tax_number', 'company_registratoin_number', 'address', 'mail_address', 'additional_informations'];

    protected $dates = ['deleted_at'];

    public function contact() {
        return $this->hasOne(User::class, 'id', 'contact_user');
    }

    public function main_address() {
        return $this->hasOne(Address::class, 'id', 'address');
    }

    public function mail_address() {
        return $this->hasOne(Address::class, 'id', 'mail_address');
    }
}
