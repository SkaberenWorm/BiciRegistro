@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{ URL::previous() }}" class="btn btn-light float-right">Volver</a>
                    <h3 style="margin-bottom: 0px">Detalle bicicleta </h3>
                </div>
                <div class="">
                    <!-- BICICLETA -->
                    <div class="card m-3">
                        <div class="row">
                            <div class="col-md-4 pb-0 mb-0">
                                <img src="{{ Storage::url($vehiculo->image) }}"class="img-fluid rounded img-thumbnail" alt=".   Imagen bicicleta">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">

                                    <table class="table responsive-md pb-0 mb-0 table-sm">
                                      <tbody>
                                        <tr>
                                          <th scope="row" style="width:30%;">Código</th>
                                          <td>{{ $vehiculo->codigo }}</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Marca</th>
                                          <td>{{ $vehiculo->marca->description }}</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Modelo</th>
                                          <td>{{ $vehiculo->modelo }}</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Color</th>
                                          <td>
                                            {{$vehiculo->color}}
                                        </td>
                                        </tr>

                                      </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BICICLETA -->
                    <!-- DUEÑO -->
                    <div class="card m-3">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ Storage::url($vehiculo->dueno->image) }}" class="img-fluid rounded img-thumbnail" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                  <table class="table responsive-md table-sm">
                                    <thead>
                                      <tr>
                                        <th colspan="2">
                                          <h4 class="mt-1 mb-0"><b>{{ $vehiculo->dueno->nombre }}</b></h4>
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row" style="width:30%;">Run</th>
                                        <td>{{ $vehiculo->dueno->rut }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Nombre</th>
                                        <td>{{ $vehiculo->dueno->nombre }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Área</th>
                                        <td>{{ $vehiculo->dueno->tipoDueno->description }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Correo</th>
                                        <td>{{ $vehiculo->dueno->correo }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Celular</th>
                                        <td>+569 {{ $vehiculo->dueno->celular }}</td>
                                      </tr>

                                    </tbody>
                                  </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END DUEÑO -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
