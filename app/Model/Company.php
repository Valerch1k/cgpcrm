<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    public function clients()
    {
        return $this->hasMany(Client::class,'company_id','id');
    }
}
