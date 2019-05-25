@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" >
                <div class="card-header"><h3 style="margin-bottom: 0px">Registrar bicicleta </h3> </div>
                {{ Form::open(['enctype' => 'multipart/form-data','route' => 'vehiculos.store', 'file'=>true, 'id'=>'formEnviar']) }}
                <div class="card-body" style="padding: 0.5rem;">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header"><h5 style="margin-bottom: 0px">Bicicleta </h5> </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('vehiculos.partials.form')
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h5 style="margin-bottom: 0px">Dueño </h5> </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('vehiculos.partials.duenoForm')
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group float-right mt-2">
                        <a href="{{route('vehiculos.index')}}" class="btn btn-light mr-2">Volver</a>
                        <button type="button" class="btn btn-primary"  onclick="enviarForm()" name="button">Guardar</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
    $("#selectMarca").select2({
            allowClear: false
        })

      function enviarForm() {
         $("#formEnviar").submit();
       }

    </script>
</div>
@endsection
