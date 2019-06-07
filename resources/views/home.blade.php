@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                  <h4 class="mb-0">Hola {{Auth::user()->name}}</h4>
                </div>
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="list-group col-sm-10">
                      <button type="button" class="list-group-item list-group-item-action active">
                        <h5 class="text-while mb-0">Empecemos</h5>
                      </button>
                      @can('vehiculos.index')
                        <a class="list-group-item list-group-item-action" href="{{ route('vehiculos.index') }}">Listar bicicletas</a>
                      @endcan
                      @can('vehiculos.create')
                        <a class="list-group-item list-group-item-action" href="{{ route('vehiculos.create') }}">Registrar nueva bicicletas</a>
                      @endcan
                      @can('registros.index')
                        <a class="list-group-item list-group-item-action" href="{{ route('registro.index') }}">Registrar entrada y salida de una bicicleta</a>
                      @endcan
                      @can('registros.tercero')
                        <a class="list-group-item list-group-item-action" href="{{route('registro.crearCodigoTercero')}}">Generar código para retiro por terceros</a>
                      @endcan
                      @can('registros.reporte')
                        <a class="list-group-item list-group-item-action" href="{{route('registro.reporte')}}">Visualizar reportes</a>
                      @endcan

                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
