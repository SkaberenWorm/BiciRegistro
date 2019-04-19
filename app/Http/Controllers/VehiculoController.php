<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Dueno;
use App\Vehiculo;
use App\TipoDueno;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::get();
        $duenos = Dueno::get();
        $vehiculos = Vehiculo::paginate(10);
        return view('vehiculos.index', compact('vehiculos','marcas','duenos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->file('imagen')->store('public');
        $vehiculo = Vehiculo::create($request->all());

        // IMAGE
        if($request()->file('imagen')){
            $path=Storage::disk('public')->put('image', $request->file('imagen'));
            $vehiculo->fill(['imagen'=>asset($path)])->save();
        }

     //   return back()->with('info','Bicicleta guardada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        $marca = Marca::find($vehiculo->marca_id)->first();
        $dueno = Dueno::find($vehiculo->dueno_id)->first();
        $tipoDueno = TipoDueno::find($dueno->tipoDueno_id)->first();
        return view('vehiculos.show', compact('vehiculo', 'marca','dueno','tipoDueno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        $marca = Marca::find($vehiculo->marca_id)->first();
        //dd($marca->description);
        return view('vehiculos.edit', compact('vehiculo','marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.edit', $vehiculo->id)
        ->with('info','Bicicleta actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return back()->with('info','Eliminado correctamente');
    }
}
