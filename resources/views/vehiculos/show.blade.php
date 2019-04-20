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
                            <div class="col-md-4">
                                <img src="{{ Storage::url($vehiculo->image) }}" class="card-img" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$vehiculo->marca->description}} {{$vehiculo->modelo}}</h5>
                                    <p class="card-text">
                                        Marca: {{$vehiculo->marca->description }} <br>
                                        Modelo:  {{$vehiculo->modelo }} <br>
                                        Código: {{$vehiculo->codigo }} <br>
                                        Color:  {{$vehiculo->color }} <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BICICLETA -->
                    <!-- DUEÑO -->
                    <div class="card m-3">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ Storage::url($vehiculo->dueno->image) }}" class="card-img " alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$vehiculo->dueno->nombre}}</h5>
                                    <p class="card-text">
                                        Run:    {{ $vehiculo->dueno->rut }} <br>
                                        Área:   {{ $vehiculo->dueno->tipoDueno->description}}<br>
                                        Correo: {{ $vehiculo->dueno->correo }}<br>
                                        Celular:{{ $vehiculo->dueno->celular }} <br>
                                    </p>
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
