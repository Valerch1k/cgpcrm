<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
}
