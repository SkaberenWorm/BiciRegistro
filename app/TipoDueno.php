<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDueno extends Model
{
    protected $table = 'tipo_duenos';

    public function Duenos(){
        return $this->hasMany(Dueno::class);
    }
}
