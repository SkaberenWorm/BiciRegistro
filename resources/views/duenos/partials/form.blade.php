<div class="form-group row">
    <div class="col-sm-2">
    {{ Form::label('rut','Run') }}
    </div>
    <div class="col-sm-10">
    {{ Form::text('rut', null , ['class' => 'form-control', isset($dueno)?'disabled':'']) }}
        @if ($errors->has('rut'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('rut') }}</strong>
            </span>
         @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        {{ Form::label('nombre','Nombre') }}
    </div>
    <div class="col-sm-10">
        {{ Form::text('nombre', null, ['class' => 'form-control']) }}
        @if ($errors->has('nombre'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        {{ Form::label('correo','Correo') }}
    </div>
    <div class="col-sm-10">
        {{ Form::text('correo', null, ['class' => 'form-control']) }}
        @if ($errors->has('correo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('correo') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        {{ Form::label('tipoDueno_id','Área') }}
    </div>
    <div class="col-sm-10">
    {{ Form::select('tipoDueno_id', $tipoDuenos->pluck('description','id'), null, ['class' => 'form-control', 'placeholder' =>'Seleccione una opción']) }}
        @if ($errors->has('tipoDueno_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tipoDueno_id') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        {{ Form::label('celular','Celular') }}
    </div>
    <div class="col-sm-3">
        {{ Form::number('cel', "569", ['class' => 'form-control','disabled']) }}
    </div>
    <div class="col-sm-7">
        {{ Form::number('celular', null, ['class' => 'form-control']) }}
        @if ($errors->has('celular'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('celular') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        {{ Form::label('image','Imagen') }}
    </div>
    <div class="col-sm-10">
        {{ Form::file('image', null, null) }} <br>
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
         @endif
    </div>
</div>
