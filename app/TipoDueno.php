<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDueno extends Model
{
    public function Duenos(){
        return $this->hasMany(Dueno::class);
    }
}
