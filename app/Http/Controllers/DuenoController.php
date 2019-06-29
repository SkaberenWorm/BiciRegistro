<?php

namespace BiciRegistro\Http\Controllers;

use BiciRegistro\Dueno;
use BiciRegistro\TipoDueno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Yajra\DataTables\Datatables;
use \Illuminate\Support\Facades\Auth;

class DuenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $duenos = Dueno::get();
      return view('duenos.index', compact('duenos'));
    }

    public function listar(){
      $model = Dueno::query();
        // return datatables()->eloquent(Usuario::query())->toJson();
        return datatables()->eloquent($model)
        ->addColumn('imagen', function($dueno) {
            return '<img src="'.url('/').Storage::url($dueno->image).'" class="img-fluid rounded " style="max-height: 35px" alt="">';
        })
        ->addColumn('bicicletas', function($dueno) {
            return '<center>'.$dueno->vehiculos->count().'</center>';
        })
        ->addColumn('accion', function($dueno) {
            $botones = '';

            if (Auth::user()->can('duenos.show')) {
              $botones .= '<a class="btn btn-light btn-sm mx-1" href="'.route('duenos.show', $dueno->id).'">Ver</a>';
            }
            if (Auth::user()->can('duenos.edit')) {
              $botones .= '<a class="btn btn-light btn-sm mx-1" href="'.route('duenos.edit', $dueno->id).'">Editar</a>';
            }

            return $botones;
          })

        ->rawColumns(['imagen','accion','bicicletas'])
        ->toJson();

    }

    /**
     * Display the specified resource.
     *
     * @param  \BiciRegistro\Dueno  $dueno
     * @return \Illuminate\Http\Response
     */
    public function show(Dueno $dueno)
    {
        return view('duenos.show', compact('dueno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BiciRegistro\Dueno  $dueno
     * @return \Illuminate\Http\Response
     */
    public function edit(Dueno $dueno)
    {
        $tipoDuenos= TipoDueno::get();
        return view('duenos.edit', compact('dueno','tipoDuenos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BiciRegistro\Dueno  $dueno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dueno $dueno)
    {
      $this->validate($request, [
          'nombre' => 'required|string|max:100',
          'correo' => 'required|email|unique:duenos,correo,'.$dueno->id,
          'tipoDueno_id' => 'required',
          'image' => 'image|mimes:jpeg,png,jpg'
          ]);
      // Se valida por separado, porque no es un campo obligatorio
      if(!empty($request->input('celular'))){
        $this->validate($request, [
            'celular' => 'regex:/[92]{1}[987654321]\d{7}$/|max:9',
          ]);
      }
      $dueno->nombre = $request->input('nombre');
      $dueno->correo = $request->input('correo');
      $dueno->celular = $request->input('celular');
      $dueno->tipoDueno_id = $request->input('tipoDueno_id');
      if($request->hasFile('image')){
        $fechaHora=date("d-m-Y_g:i:s");
        $tamaño = getimagesize($request->file('image'));
        $width = intval($tamaño[0]);
        $height = intval($tamaño[1]);
        if($width > 500){
            $widthResize = $width * (500 / $width);
            $heightResize = $height * (500 / $width);
        }else{
          $widthResize = $width;
          $heightResize = $height;
        }
          $extension = $request->file('image')->getClientOriginalExtension();
          $dueno->image = 'duenos/'.$dueno->nombre.'_'.$fechaHora.'.'.$extension;
          Image::make($request->file('image'))->resize($widthResize,$heightResize)->save(storage_path('app/public/duenos/'.$dueno->nombre.'_'.$fechaHora.'.'.$extension));
      }

      $dueno->update();

      return redirect()->route('duenos.edit', $dueno->id)
      ->with('success','Dueño actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BiciRegistro\Dueno  $dueno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dueno $dueno)
    {
        //
    }
}
