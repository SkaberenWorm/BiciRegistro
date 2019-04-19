<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dueno extends Model
{
    public function tipoDueno(){
        return $this->belongsTo(TipoDueno::class);
    }
    
    public function vehiculos(){
        return $this->hasMany(Vehiculo::class);
    }
}
