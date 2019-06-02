<?php

use Illuminate\Database\Seeder;

class RegistroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 0; $i < 10000; $i++) {

        $usuario = rand(1, 13);
        $vehiculo = rand(1,200);
        $registro = BiciRegistro\Registro::create([
                    'vehiculo_id'  => $vehiculo,
                    'usuario_id'   => $usuario,
                    'accion'       => 'Ingreso',
                   ]);
       $registro = BiciRegistro\Registro::create([
                   'vehiculo_id'  => $vehiculo,
                   'usuario_id'   => $usuario,
                   'accion'       => 'Salida',
                  ]);
     }
   }
}
