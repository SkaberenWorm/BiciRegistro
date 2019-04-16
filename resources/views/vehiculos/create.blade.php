@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3 style="margin-bottom: 0px">Nueva bicicleta </h3> </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="#IMGRESAR IMAGEN" class="img-fluid rounded img-thumbnail" alt=".   Ingrese la imagen">
                        </div>
                        <div class="col-md-8">
                            {{ Form::open(['route' => 'vehiculos.store', 'file'=>true]) }}
                                @include('vehiculos.partials.form')
                            {{ Form::close() }}
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
