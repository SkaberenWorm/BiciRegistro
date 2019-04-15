@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Bicicletas
                    @can('vehiculos.create')
                    <a class="btn btn-primary float-right btn-sm" href="route{'vehiulos.create'}" >Crear</a>
                    @endcan
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Código</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Color</th>
                            @can('vehiculos.show')
                            <th style="width:10px"></th>
                            @endcan
                            @can('vehiculos.show')
                            <th style="width:10px"></th>
                            @endcan
                            @can('vehiculos.show')
                            <th style="width:10px"></th>
                            @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehiculos as $vehiculo)
                            <tr>
                            <th scope="row">{{$vehiculo->id}}</th>
                            <td>{{$vehiculo->codigo}}</td>
                            <td>{{$vehiculo->modelo}}</td>
                            <td>{{$vehiculo->color}}</td>
                            @can('vehiculos.show')
                            <td style="padding: .3rem">
                                <a class="btn btn-secondary btn-sm" href="{{route('vehiculos.show', $vehiculo->id)}}" >Ver</a>
                            </td>
                            @endcan
                            @can('vehiculos.edit')
                            <td style="padding: .3rem">
                                <a class="btn btn-secondary btn-sm" href="{{route('vehiculos.edit', $vehiculo->id)}}" >Editar</a>
                            </td>
                            @endcan
                            @can('vehiculos.destroy')
                            {{ Form::open([ 'method'  => 'delete', 'route' => [ 'vehiculos.destroy', $vehiculo->id ]]) }}
                            <td style="padding: .3rem">
                                <button class="btn btn-danger btn-sm" >
                                    Eliminar
                                </button>
                            </td>
                            {{ Form::close() }}
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
