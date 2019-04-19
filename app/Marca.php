<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function vehiculos(){
        return $this->hasMany(Vehiculo::class);
    }
}
