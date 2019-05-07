<?php

namespace BiciRegistro;

use Illuminate\Database\Eloquent\Model;

class TipoDueno extends Model
{
    protected $table = 'tipo_duenos';

    public function Duenos(){
        return $this->hasMany(Dueno::class);
    }
}
