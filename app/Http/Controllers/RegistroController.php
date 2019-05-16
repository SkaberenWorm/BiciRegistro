<?php

namespace BiciRegistro\Http\Controllers;

use BiciRegistro\Registro;
use BiciRegistro\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registrar.index');
    }

    /**
     * Buscar la bicicleta para mostrar los datos en pantalla
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $retiroPorTercero=false;
        $vehiculo = Vehiculo::where('codigo', $request->input('codigo'))->first();
        if(!isset($vehiculo)){
          $registrarNuevaBicicleta=true;
          return view('registrar.index', compact('registrarNuevaBicicleta','retiroPorTercero'));
        }

        $vehiculoEnRegistro = $this->obtenerMovimientoVehiculo($vehiculo);

        if(!isset($vehiculoEnRegistro)){
          $accion="Ingreso";
          //dd("No hay movimiento");
        }else{
          if($vehiculoEnRegistro->accion == "Ingreso"){
            $accion = "Salida";
          }else{
            $accion="Ingreso";
          }
          //dd("Hay movimiento");
        }

      if(isset($vehiculoEnRegistro->codigo_tercero)){
        //dd($vehiculoEnRegistro->codigo_tercero);
        $retiroPorTercero=true;
        return view('registrar.index', compact('vehiculo','accion','retiroPorTercero'));
      }else{
        return view('registrar.index', compact('vehiculo','accion','retiroPorTercero'));
      }

    }

    /**
     * Buscar la bicicleta para mostrar los datos en pantalla
     *
     * @return \Illuminate\Http\Response
     */
    public function validarTercero(Request $request)
    {
        echo "Esta opción esta temporalmente deshabilitada";

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Auth::user();
      setlocale(LC_ALL, 'es_CL');
      $fecha = "2019-05-12 06:00:00";
      $vehiculo = Vehiculo::find($request->input('vehiculo_id'));

      $vehiculoEnRegistro = $this->obtenerMovimientoVehiculo($vehiculo);

      if(!isset($vehiculoEnRegistro)){
        $accion="Ingreso";
        //dd("No hay movimiento");
      }else{
        if($vehiculoEnRegistro->accion == "Ingreso"){
          $accion = "Salida";
        }else{
          $accion="Ingreso";
        }
        //dd("Hay movimiento");
      }
      Registro::create([
          'vehiculo_id' => $vehiculo->id,
          'usuario_id' => $user->id,
          'accion' => $accion,
      ]);
    }

    /**
     * Retorna el último movimiento del vehiculo en el dia
     *
     * @param  \BiciRegistro\Vehiculo  $registro
     */
    public function obtenerMovimientoVehiculo(Vehiculo $vehiculo){
      // Obtenemos el ultimo movimiento de la bicicleta en el día
      $vehiculoEnRegistro = Registro::select('registros.vehiculo_id as vehiculo_id','registros.codigo_tercero as codigo_tercero', 'registros.accion as accion', 'registros.created_at')
      ->join('vehiculos', 'vehiculos.id', '=', 'registros.vehiculo_id')
      ->where('registros.vehiculo_id','=',$vehiculo->id)
      ->where('registros.created_at','like',date("Y-m-d").'%')
      ->orderBy('registros.created_at', 'desc')
      ->first();
      return $vehiculoEnRegistro;
    }


    /**
     * Display the specified resource.
     *
     * @param  \BiciRegistro\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BiciRegistro\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BiciRegistro\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BiciRegistro\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        //
    }
}
