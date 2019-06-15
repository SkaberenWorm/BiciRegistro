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
                                <div class="card-header">
                                  <div class="row">
                                    <div class="col-5">
                                      <h5 style="margin-bottom: 0px">Dueño </h5>
                                    </div>
                                    <div class="col-7 text-right">
                                      <div class="form-check">
                                        <label class="" for="duenoExistente">
                                        <input type="checkbox" id="duenoExistente" name="duenoExistente" class="form-check-input" >
                                        Existente</label>
                                        @if ($errors->has('duenoExistente'))
                                            <span class="invalid-feedback duenoExistente" role="alert">
                                                <strong>{{ $errors->first('duenoExistente') }}</strong>
                                            </span>
                                         @endif
                                      </div>
                                    </div>
                                  </div>


                                </div>
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
       $('#duenoExistente').click(function(){
         if($('#duenoExistente').prop('checked')){
           $('input[name="nombre_dueno"]').prop('disabled', true);
           $('input[name="correo_dueno"]').prop('disabled', true);
           $('input[name="celular_dueno"]').prop('disabled', true);
           $('select[name="tipoDueno"]').prop('disabled', true);
           $('input[name="image_dueno"]').prop('disabled', true);

           $('.nombre_dueno').css('display','none');
           $('.correo_dueno').css('display','none');
           $('.celular_dueno').css('display','none');
           $('.tipoDueno').css('display','none');
           $('.image_dueno').css('display','none');
         }else{
           $('input[name="nombre_dueno"]').prop('disabled', false);
           $('input[name="correo_dueno"]').prop('disabled', false);
           $('input[name="celular_dueno"]').prop('disabled', false);
           $('select[name="tipoDueno"]').prop('disabled', false);
           $('input[name="image_dueno"]').prop('disabled', false);

           $('.nombre_dueno').css('display','none');
           $('.correo_dueno').css('display','none');
           $('.celular_dueno').css('display','none');
           $('.tipoDueno').css('display','none');
           $('.image_dueno').css('display','none');
         }
       });
    </script>
</div>
@endsection
