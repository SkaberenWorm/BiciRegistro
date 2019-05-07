<?php

namespace BiciRegistro;

use Illuminate\Database\Eloquent\Model;

class Dueno extends Model
{
    protected $fillable = [
        'rut','nombre', 'correo', 'celular','tipoDueno_id','image', 
    ];
    public function tipoDueno(){
        return $this->belongsTo(TipoDueno::class,'tipoDueno_id');
    }
    
    public function vehiculos(){
        return $this->hasMany(Vehiculo::class);
    }
}
