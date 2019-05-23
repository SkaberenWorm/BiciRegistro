@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11 col-sm-12">
            <div class="card">
                <div class="card-header">

                  <div class="row ">
                      {{ Form::open(['route' => 'registro.findDueno','class' => 'col-sm-6 col-md-6']) }}
                      <div class="mb-3 mt-2">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">RUN</span>
                          </div>
                          <input type="text" id="buscarDueno" class="form-control mr-1" name="run" data-toggle="tooltip" data-placement="bottom" title="Ingrese run del ciclista" required  autofocus>

                          {{ Form::submit('Buscar', ['class' => 'btn btn-secondary', 'id'=>'btnBuscarDueno']) }}
                        </div>
                      </div>
                      {{ Form::close() }}
                      @if(isset($dueno))
                      <div class="col-md-3 col-sm-2 col-lg-4">

                      </div>
                      @if($dueno->vehiculos->where('activo',true)->count() <= 1)
                      <div class="col-sm-4 col-md-3 mt-2 col-lg-2 px-0">
                        <div class="input-group mx-auto">
                          <button style="z-index:1"type="button" class="btn btn-success" id="generarCodigo" name="generarCodigo" data-toggle="modal" data-target="#generarCodigoModal"><b>Generar código</b></button>
                        </div>
                      </div>
                      @endif
                      @endif
                    </div>
                  </div>


                  @if(isset($dueno))
                    <div class="row card-body">
                      <div class="row col-md-6 my-3">
                        <div class="col-sm-5">
                          <img src="{{ Storage::url($dueno->image) }}" class="img-fluid rounded mx-auto d-block mb-3" style="max-height:150px;">
                        </div>
                        <div class="col-sm-7">
                          <table class="table responsive-md table-sm mb-0 pb-0">
                            <tbody>
                              <tr>
                                <th scope="row" style="width:30%;">Run</th>
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

                            </tbody>
                          </table>
                        </div>


                      </div>
                      @if($dueno->vehiculos->where('activo',true)->count()>1)
                      <div class="col-md-6 mt-3">
                        @foreach($dueno->vehiculos->where('activo',true) as $vehiculo)
                          <div id="accordion">
                          <div class="card">
                            <div class="card-header py-0" id="heading{{$vehiculo->id}}">
                              <div class="row justify-content-center" data-toggle="collapse" data-target="#collapseOne{{$vehiculo->id}}" aria-expanded="true" aria-controls="collapseOne{{$vehiculo->id}}">
                                <div class="col-sm-3 mt-1">
                                  <img src="{{ Storage::url($vehiculo->image) }}" class="img-fluid rounded" style="max-height:50px;" alt="">
                                </div>
                                <h5 class="mb-0 col-sm-5">
                                  <button class="btn btn-link" style="text-decoration:none" data-toggle="collapse" data-target="#collapseOne{{$vehiculo->id}}" aria-expanded="true" aria-controls="collapseOne{{$vehiculo->id}}">
                                    <b>{{$vehiculo->marca->description}} {{$vehiculo->modelo}}</b><br>
                                    {{$vehiculo->codigo}}
                                  </button>
                                </h5>
                                <div class="col-sm-3">
                                  <div class="input-group mt-3">
                                    <button type="button" class="btn btn-success btn-sm" id="generarCodigo" name="generarCodigo" data-toggle="modal" data-target="#generarCodigoModal"><b>Generar código</b></button>
                                  </div>
                                </div>
                              </div>

                            </div>

                            <div id="collapseOne{{$vehiculo->id}}" class="collapse" aria-labelledby="heading{{$vehiculo->id}}" data-parent="#accordion">
                              <div class="row card-body">
                                <div class="col-sm-5">
                                  <img src="{{ Storage::url($vehiculo->image) }}" class="img-fluid rounded mx-auto d-block mb-3" style="max-height:200px;" alt="">

                                </div>
                                <div class="col-sm-7">
                                  <table class="table responsive-md table-sm mb-4">
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
                                          <div class="cuadrado"  style="width: 50px;
                                          height: 25px; border-radius: 3px; border: 1px solid #555;
                                          background-color: {{$vehiculo->color}}">
                                          </div>
                                        </td>
                                      </tr>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>


                      @else
                      <div class="col-md-6">
                        <div class="row">
                          <div class="row card-body">
                            <div class="col-sm-5">
                              <img src="{{ Storage::url($dueno->vehiculos[0]->image) }}" class="img-fluid rounded mx-auto d-block mb-3" style="max-height:200px;" alt="">

                            </div>
                            <div class="col-sm-7">
                              <table class="table responsive-md table-sm mb-4">
                                <tbody>
                                  <tr>
                                    <th scope="row" style="width:30%;">Código</th>
                                    <td>{{ $dueno->vehiculos[0]->codigo }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Marca</th>
                                    <td>{{ $dueno->vehiculos[0]->marca->description }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Modelo</th>
                                    <td>{{ $dueno->vehiculos[0]->modelo }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Color</th>
                                    <td>
                                      <div class="cuadrado"  style="width: 50px;
                                      height: 25px; border-radius: 3px; border: 1px solid #555;
                                      background-color: {{$dueno->vehiculos[0]->color}}">
                                      </div>
                                    </td>
                                  </tr>

                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif
                    </div>
                  @else

                    <div class="card-body">
                      <div class="row justify-content-center">
                        @if(isset($registrarDueno))
                        <div class="row justify-content-center col-md-10">
                          <h3 class="text-danger">Este RUN no esta registrado en el sistema</h3>
                        </div>
                        <div class="row justify-content-center col-md-10">
                          @can('vehiculos.create')
                          <a class="btn btn-primary" href="{{route('vehiculos.create')}}" >Registrar</a>
                          @endcan
                        </div>
                        @else
                        <h3 class="text-secondary">Ingrese RUN del ciclista</h3>
                        @endif

                      </div>
                    </div>
                  @endif

                </div>


            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="generarCodigoModal" tabindex="-1" role="dialog" aria-labelledby="generarCodigoModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#00c851;">
            <h5 class="modal-title text-white"><b>Código generado</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Enviar e-mail</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal -->
</div>
@endsection
