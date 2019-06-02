<?php

namespace BiciRegistro;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        'codigo','marca_id', 'modelo', 'color','dueno_id','image','activo','isInside'
    ];

    public function dueno(){
        return $this->belongsTo(Dueno::class);
    }
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
}
