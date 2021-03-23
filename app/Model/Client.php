<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'phone',
        'email',
        'shipping_address',
        'billing_address',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
}
