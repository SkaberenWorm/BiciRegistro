<?php

use Illuminate\Database\Seeder;
use BiciRegistro\Vehiculo;

class RegistroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sabados = array(1,8,15,22);
      $domingos = array(2,9,16,23);
      for($j=1;$j<=28;$j++){
        $bicicletasPorDia = rand(60,150);
        for($diaS=0;$diaS<sizeof($sabados);$diaS++){
          if($sabados[$diaS] == $j){
            $bicicletasPorDia = rand(40,70);
          }
        }
        for($diaD=0;$diaD<sizeof($domingos);$diaD++){
          if($domingos[$diaD] == $j){
            $bicicletasPorDia = 0;
            break;
          }
        }
        // Bicicletas que serán registradas
        $bike = array();
        // Registrar entradas de 7 a 21 hrs
        for($i = 0; $i < $bicicletasPorDia; $i++){
          $usuario = 2;
          $vehiculo = rand(1,100);
          array_push($bike,$vehiculo);
          $segundo = rand(0,59);
          $minuto = rand(0,59);

          $hora = rand(7,21);
          for($diaS=0;$diaS<sizeof($sabados);$diaS++){
            if($sabados[$diaS] == $j){
              $hora = rand(7,14);
            }
          }
          $dia = $j;
          $fecha = '2019-06-'.$dia.' '.$hora.':'.$minuto.':'.$segundo;
          $date = date_create($fecha);
          $registro = BiciRegistro\Registro::create([
                      'vehiculo_id'  => $vehiculo,
                      'usuario_id'   => $usuario,
                      'accion'       => 'Ingreso',
                      'created_at'  => date_format($date, 'Y-m-d H:i:s'),
                      'updated_at'  => date_format($date, 'Y-m-d H:i:s'),
                     ]);

           // REGISTRAR SALIDA
           $segundo = rand(0,59);
           $minuto = rand(0,59);
           if(date("H", strtotime($fecha)) < 15){
             $hora = rand((date("H", strtotime($fecha))+1),17);
           }else if(date("H", strtotime($fecha)) < 17){
             $hora = rand((date("H", strtotime($fecha))+1),19);
           } else{
             $hora = rand(18,23);
           }

          // Dia de la presentacion 28 de junio
           if($dia == 28){
             if($hora <= 22){
               $fecha = '2019-06-'.$dia.' '.$hora.':'.$minuto.':'.$segundo;
               $date = date_create($fecha);
               $registro = BiciRegistro\Registro::create([
                           'vehiculo_id'  => $vehiculo,
                           'usuario_id'   => $usuario,
                           'accion'       => 'Salida',
                           'created_at'  => $date,
                           'updated_at'  => $date,
                          ]);
             }else{
               // Cambiar isInside a true
               $bici = Vehiculo::find($vehiculo);
               $bici->isInside = true;
               $bici->updated_at = date_create($fecha);
               $bici->update();
             }

           }else{
             $fecha = '2019-06-'.$dia.' '.$hora.':'.$minuto.':'.$segundo;
             $date = date_create($fecha);
             $registro = BiciRegistro\Registro::create([
                         'vehiculo_id'  => $vehiculo,
                         'usuario_id'   => $usuario,
                         'accion'       => 'Salida',
                         'created_at'  => $date,
                         'updated_at'  => $date,
                        ]);
           }

         }

      }


   }
}
