@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 style="margin-bottom: 0px">Detalle bicicleta: <span style="font-size: 1.3rem">{{$vehiculo->codigo}}</span> </h3> 
                </div>
                <div class="rocard-body">
                    <div class="">
                        <!-- BICICLETA -->
                        <div class="card m-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{$vehiculo->image}}" class="card-img" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$vehiculo->marca}}[MARCA] {{$vehiculo->modelo}}</h5>
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
                                    <img src="{{$vehiculo->image}}" class="card-img" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Nombre Dueño</h5>
                                        <p class="card-text">
                                            Área:  <br> 
                                            Correo:  <br>
                                            Celular:  <br>
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
</div>
@endsection
