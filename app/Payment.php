<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function bank()
    {

        return $this->hasOne('App\Bank', 'id','bank_to');
    }
}
