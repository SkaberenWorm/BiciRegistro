@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                  <div class="row ">
                      {{ Form::open(['route' => 'registrar.find','class' => 'col-md-6']) }}
                      <div class="mb-2 mt-2">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Código</span>
                          </div>
                          <input type="text" class="form-control mr-1" name="codigo" autofocus="autofocus" required  >
                          {{ Form::submit('Buscar', ['class' => 'btn btn-secondary']) }}
                        </div>
                      </div>
                      {{ Form::close() }}



                    </div>
                  </div>
                  @if(isset($vehiculo))
                  <div class="row justify-content-center pt-4 pl-2">
                    <div class="col-md-4">
                      <h4 class="text-danger">Acción: Entrada / Salida </h4>
                    </div>
                    <div class="col-md-4">
                      <h4 class="text-danger ">Fecha: <?php setlocale(LC_ALL, 'es_CL'); echo (date("d/m/Y")); ?> </h4>
                      <h4 class="text-danger ">Hora: <?php echo (date("g:i a")); ?> </h4>
                    </div>
                    <div class="col-md-4">
                      <button type="button" class="btn btn-success">REGISTRAR</button>
                      <button type="button" class="btn btn-outline-danger  ml-2">RECHAZAR</button>

                    </div>
                  </div>

                  <div class="card-body">
                    <div class="row justify-content-center">
                      <!-- BICICLETA -->
                      <div class="card col-md-6 mb-3">
                          <div class="row justify-content-center">
                              <div class="col-md-8 mt-2">
                                  <img src="{{ Storage::url($vehiculo->image) }}" class="" style="height:200px;" alt="">
                              </div>
                              <div class="col-md-12">
                                  <div class="card-body">

                                      <table class="table responsive-md table-sm">
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
                                            <td>{{ $vehiculo->color }}</td>
                                          </tr>

                                        </tbody>
                                      </table>

                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- END BICICLETA -->
                      <!-- DUEÑO -->
                      <div class="card col-md-6">
                          <div class="row justify-content-center">
                              <div class="col-md-8 mt-2">
                                  <img src="{{ Storage::url($vehiculo->dueno->image) }}" class="" style="height:200px;">
                              </div>
                              <div class="col-md-12">
                                  <div class="card-body">
                                    <table class="table responsive-md table-sm">
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
                  @else
                    <div class="card-body">
                      <div class="row justify-content-center">
                        @if(isset($registrarNuevaBicicleta))
                        <div class="row justify-content-center col-md-10">
                          <h3 class="text-danger">Esta bicicleta no esta registrada en el sistema</h3>
                        </div>
                        <div class="row justify-content-center col-md-10">
                          @can('vehiculos.create')
                          <a class="btn btn-primary" href="{{route('vehiculos.create')}}" >Registrar bicicleta</a>
                          @endcan
                        </div>
                        @else
                        <h3 class="text-secondary">Ingrese el código de la bicicleta</h3>
                        @endif

                      </div>
                    </div>
                  @endif

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
