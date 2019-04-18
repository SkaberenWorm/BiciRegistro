@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            
                <div class="card-header">
                    @can('vehiculos.create')
                    <a class="btn btn-primary float-right btn-md" href="{{route('vehiculos.create')}}" >Crear</a>
                    @endcan
                   
                    <h3 style="margin-top: 5px; margin-bottom: 0px">Bicicletas</h3>   
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                            <th scope="col">N°</th>
                            <th scope="col" style="width: 10px;">Imagen</th>
                            <th scope="col">Código</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Color</th>
                            <th scope="col">Dueño</th>
                            @can('vehiculos.show')
                            <th style="width:10px"></th>
                            @endcan
                            @can('vehiculos.edit')
                            <th style="width:10px"></th>
                            @endcan
                            @can('vehiculos.destroy')
                            <th style="width:10px"></th>
                            @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehiculos as $vehiculo)
                            <tr>
                                <td>{{$vehiculo->id}}</td>
                                <td style="padding: 0.05rem 0.75rem 0.05rem 0.75rem; vertical-align: inherit;">
                                    <img src="{{$vehiculo->image}}" class="img-fluid rounded " style="max-height: 35px" alt="">
                                <td>{{$vehiculo->codigo}}</td>
                                </td>
                                <td>
                                @foreach($marcas as $marca)
                                @if($marca->id === $vehiculo->marca_id)
                                        {{$marca->description}}
                                    @endif()
                                @endforeach
                                </td>
                                <td>{{$vehiculo->modelo}}</td>
                                <td>{{$vehiculo->color}}</td>
                                <td>
                                @foreach($duenos as $dueno)
                                @if($dueno->id === $vehiculo->dueno_id)
                                        {{$dueno->nombre}}
                                    @endif()
                                @endforeach
                                </td>
                                @can('vehiculos.show')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="{{route('vehiculos.show', $vehiculo->id)}}" >Ver</a>
                                </td>
                                @endcan
                                @can('vehiculos.edit')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="{{route('vehiculos.edit', $vehiculo->id)}}" >Editar</a>
                                </td>
                                @endcan
                                @can('vehiculos.destroy')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'vehiculos.destroy', $vehiculo]]) }}
                                    {{ Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) }}
                                {{ Form::close() }}
                                </td>
                                @endcan
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>
                    {{ $vehiculos->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
