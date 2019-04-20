@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                <a href="{{ URL::previous() }}" class="btn btn-light float-right">Volver</a>
                    <h3 style="margin-bottom: 0px">Detalle Rol </h3>
                </div>
                <div class="card-body">
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-2">
                            Nombre
                            </div>
                            <div class="col-sm-10">
                            {{ $role->name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                URL
                            </div>
                            <div class="col-sm-10">
                                {{ $role->slug }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                Descripción
                            </div>
                            <div class="col-sm-10">
                                {{ $role->description? : 'Sin descripción' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                Permiso especial
                            </div>
                            <div class="col-sm-10">
                                {{ $role->special? : 'Sin permisos especiales' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                Permisos
                            </div>
                            <div class="col-sm-10">
                                <ul class="list-unstyled">

                                    @php ($cantidadPermisos = 0)
                                    @foreach($role->permissions as $permission)
                                        <li>
                                            @php ($cantidadPermisos++)
                                            {{ $permission->name}}
                                            <em>
                                            ({{ $permission->description}})
                                            </em>
                                        </li>
                                    @endforeach
                                    @if($cantidadPermisos <= 0)
                                        Sin permisos
                                    @endif
                                </ul>
                            </div>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
