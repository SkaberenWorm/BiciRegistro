<?php

namespace BiciRegistro\Http\Controllers;

use BiciRegistro\Dueno;
use BiciRegistro\TipoDueno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class DuenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $duenos = Dueno::paginate(10);
      return view('duenos.index', compact('duenos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
          'nombre' => 'required|string|max:255',
          'correo' => 'required|email|unique:duenos,correo,'.$dueno->id,
          'tipoDueno_id' => 'required',
          'image' => 'image|mimes:jpeg,png,jpg'
          ]);

      $dueno->nombre = $request->input('nombre');
      $dueno->correo = $request->input('correo');
      $dueno->celular = $request->input('celular');
      $dueno->tipoDueno_id = $request->input('tipoDueno_id');
      if($request->hasFile('image')){

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
          $dueno->image = 'duenos/'.$dueno->nombre.date("d-m-Y g:i:s").'.'.$extension;
          Image::make($request->file('image'))->resize($widthResize,$heightResize)->save(storage_path('app/public/duenos/'.$dueno->nombre.date("d-m-Y g:i:s").'.'.$extension));
      }

      $dueno->update();

      return redirect()->route('duenos.edit', $dueno->id)
      ->with('info','Dueño actualizado correctamente');
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
