<?php

namespace BiciRegistro;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'accion','vehiculo_id', 'usuario_id', 'codigo_tercero',
  ];

  public function dueno(){
      return $this->belongsTo(Dueno::class);
  }
  public function vehiculo(){
      return $this->belongsTo(Vehiculo::class);
  }
  public function usuario(){
      return $this->belongsTo(User::class);
  }


}
