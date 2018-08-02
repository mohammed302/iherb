<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   public function state()
    {

        return $this->hasOne('App\State', 'id', 'status_id');
    }
}
