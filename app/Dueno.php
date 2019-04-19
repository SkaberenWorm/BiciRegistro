<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dueno extends Model
{
    protected $fillable = [
        'rut','nombre', 'correo', 'celular','tipoDueno_id','image', 
    ];
    public function tipoDueno(){
        return $this->belongsTo(TipoDueno::class);
    }
    
    public function vehiculos(){
        return $this->hasMany(Vehiculo::class);
    }
}
