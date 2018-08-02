<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
     public function orders()
    {

        return $this->hasOne('App\Order', 'status_id','id');
    }
}
