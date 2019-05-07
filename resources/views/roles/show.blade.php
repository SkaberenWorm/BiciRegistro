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
                  <table class="table responsive-md">
                    <tbody>
                        <th scope="row" style="width:30%;">Nombre</th>
                        <td>{{ $role->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row">URL</th>
                        <td>{{ $role->slug }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Descripción</th>
                        <td>{{ $role->description? : 'Sin descripción' }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Permiso especial</th>
                        <td>{{ $role->special? $role->special==='ninguno'?'Sin permisos especiales':'' : 'Sin permisos especiales' }}</td>
                      </tr>
                      <tr>
                        <th >Permisos</th>

                        <td>
                          @foreach($role->permissions as $permission)
                            {{$permission->name}}
                            <em class="text-secondary">({{ $permission->description?:'Sin descripción'}})</em> <br>
                          @endforeach
                          @if($role->permissions->count() <= 0)
                              Sin permisos
                          @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
