@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{ URL::previous() }}" class="btn btn-light float-right">Volver</a>
                    <h3 style="margin-bottom: 0px">Detalle usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        <img src="{{ Storage::url($user->image) }}" class="img-fluid rounded img-thumbnail" alt=".   Imagen usuario">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2">
                                    Nombre: <br>
                                    Correo: <br>
                                    Roles: <br>
                                </div>
                                <div class="col-md-10">
                                    {{ $user->name }} <br>
                                    {{ $user->email }} <br>
                                    @foreach($user->roles as $role)
                                          {{ $role->name }}  <em>({{ $role->description? : "sin descripción" }})</em><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
