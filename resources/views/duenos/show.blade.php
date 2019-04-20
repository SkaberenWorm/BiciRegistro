@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{ URL::previous() }}" class="btn btn-light float-right">Volver</a>
                    <h3 style="margin-bottom: 0px">Detalle dueño</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        <img src="{{ Storage::url($dueno->image) }}" class="img-fluid rounded img-thumbnail" alt=".   Imagen dueño">
                        </div>
                        <div class="col-md-9">
                          <table class="table responsive-md">
                            <tbody>
                              <tr>
                                <th scope="row">Run</th>
                                <td>{{ $dueno->rut }}</td>
                              </tr>
                              <tr>
                                <th scope="row">Nombre</th>
                                <td>{{ $dueno->nombre }}</td>
                              </tr>
                              <tr>
                                <th scope="row">Área</th>
                                <td>{{ $dueno->tipoDueno->description }}</td>
                              </tr>
                              <tr>
                                <th scope="row">Correo</th>
                                <td>{{ $dueno->correo }}</td>
                              </tr>
                              <tr>
                                <th scope="row">Celular</th>
                                <td>+569 {{ $dueno->celular }}</td>
                              </tr>
                              <tr>
                                @if($dueno->vehiculos->count() > 1)
                                <th >Bicicletas</th>
                                @else
                                <th >Bicicleta</th>
                                @endif
                                <td>
                                  @foreach($dueno->vehiculos as $vehiculo)
                                    {{$vehiculo->marca->description }} {{ $vehiculo->modelo }}
                                    <em><a class="btn  btn-sm" href="{{route('vehiculos.show', $vehiculo->id)}}" >
                                      ({{ $vehiculo->codigo }})
                                    </a></em> <br>
                                  @endforeach
                                </td>
                              </tr>
                            </tbody>
                          </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
