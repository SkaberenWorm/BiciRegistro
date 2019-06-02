<?php

namespace BiciRegistro\Http\Controllers;

use BiciRegistro\Registro;
use BiciRegistro\Vehiculo;
use BiciRegistro\Dueno;
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
        $this->validate($request, [
          'codigo' => 'required',
        ]);
        $retiroPorTercero=false;
        $vehiculo = Vehiculo::where('codigo', $request->input('codigo'))->first();
        if(!isset($vehiculo)){
          $registrarNuevaBicicleta=true;
          return view('registrar.index', compact('registrarNuevaBicicleta','retiroPorTercero'));
        }else{
          if(!$vehiculo->activo){
            return view('registrar.index',['danger'=>'Bicicleta DESHABILITADA!!']);
          }
        }

        $vehiculoEnRegistro = $this->obtenerMovimientoVehiculo($vehiculo);

        if($vehiculo->isInside){
          $accion="Salida";
        }else{
          $accion="Ingreso";
        }

      if(isset($vehiculoEnRegistro->codigo_tercero)){
        //dd($vehiculoEnRegistro->codigo_tercero);
        $retiroPorTercero=true;
        return view('registrar.index', compact('vehiculo','accion','retiroPorTercero'));
      }else{
        return view('registrar.index', compact('vehiculo','accion','retiroPorTercero'));
      }

    }


    public function findDueno(Request $request)
    {
        $dueno = Dueno::where('rut', $request->input('run'))->first();

        if(!isset($dueno)){
          $registrarDueno=true;
          return view('registrar.createCode', compact('registrarDueno'));
        }else{
          if($dueno->vehiculos->where('activo',true)->count() >= 1){

            return view('registrar.createCode', compact('dueno'));
          }else{
            return view('registrar.createCode',['danger'=>'El usuario no tiene bicicletas registradas']);
          }

        }

    }

    /**
     * Buscar la bicicleta para mostrar los datos en pantalla
     *
     * @return \Illuminate\Http\Response
     */
    public function validarTercero(Request $request)
    {
        return "Validar codigo tercro";
    }

    public function crearCodigoTercero(){
      return view('registrar.createCode');
    }



    /**
     * Guarda el registro de entrada o salida de la bicicleta
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Auth::user();
      setlocale(LC_ALL, 'es_CL');
      $vehiculo = Vehiculo::find($request->input('vehiculo_id'));

      $vehiculoEnRegistro = $this->obtenerMovimientoVehiculo($vehiculo);

      if(!isset($vehiculoEnRegistro)){
        $accion="Ingreso";
        //dd("No hay movimiento");
      }else{
        if($vehiculo->isInside){
          $accion = "Salida";
            $vehiculo->isInside = false;
        }else{
          $accion="Ingreso";
            $vehiculo->isInside = true;
        }
        //dd("Hay movimiento");
      }
      $vehiculo->update();
      Registro::create([
          'vehiculo_id' => $vehiculo->id,
          'usuario_id' => $user->id,
          'accion' => $accion,
      ]);
      return view('registrar.index',['success' => 'Registro guardado']);
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

    /*
    * Funcion que devuelve el rut de los dueños para el autocompletar
    */
    public function searchDueno(Request $request){
      $search = $request->get('term');
      $duenos = Dueno::select('rut')
      ->where('rut', 'LIKE', '%'. $search. '%')->get();
      $data = [];
      foreach ($duenos as $dueno) {
        $data[]=$dueno->rut;
      }
      return response($data);
    }



}
