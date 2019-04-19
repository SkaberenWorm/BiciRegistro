@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('vehiculos.index')}}" class="btn btn-light float-right">Volver</a>
                    <h3 style="margin-bottom: 0px">Detalle bicicleta </h3> 
                </div>
                <div class="">
                    <!-- BICICLETA -->
                    <div class="card m-3">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{$vehiculo->image}}" class="card-img" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$marca->description}} {{$vehiculo->modelo}}</h5>
                                    <p class="card-text">
                                        Código: {{$vehiculo->codigo}} <br> 
                                        Color:  {{$vehiculo->color}} <br>
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
                                <img src="{{$dueno->image}}" class="card-img" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dueno->nombre }}</h5>
                                    <p class="card-text">
                                        Área:  {{ $tipoDueno->description }}<br> 
                                        Correo:  {{ $dueno->correo }}<br>
                                        Celular: {{ $dueno->celular }} <br>
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
