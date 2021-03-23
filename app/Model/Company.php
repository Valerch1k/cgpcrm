<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'company_name', 'phone', 'description',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class,'company_id','id');


    }
}
