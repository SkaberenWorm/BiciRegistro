@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    @can('roles.create')
                    <a class="btn btn-primary float-right btn-md" href="{{route('roles.create')}}" >Crear</a>
                    @endcan

                    <h3 style="margin-top: 5px; margin-bottom: 0px">Roles</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>URL (slug)</th>
                            <th>Descipción</th>
                            <th>Usuarios</th>
                            @can('roles.show')
                            <th style="width:10px"></th>
                            @endcan
                            @can('roles.edit')
                            <th style="width:10px"></th>
                            @endcan
                            @can('roles.destroy')
                            <th style="width:10px"></th>
                            @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            @if($role->users->where('activo',true)->count()==0)
                                <tr style="color:red">
                            @else
                                <tr>
                            @endif
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>{{$role->description? : "Sin descripción"}}</td>
                                <td class="text-center" style="width:10%;">{{$role->users->where('activo',true)->count()}}</td>
                                @can('roles.show')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="{{route('roles.show', $role->id)}}" >Ver</a>
                                </td>
                                @endcan
                                @can('roles.edit')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="{{route('roles.edit', $role->id)}}" >Editar</a>
                                </td>
                                @endcan
                                @can('roles.destroy')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                  <button type="button" name="button" onclick="btnEliminar('{{$role->id}}','{{$role->name}}','{{$role->description}}')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarRoleModal">Eliminar</button>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete-->
    <div class="modal fade" id="eliminarRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          {{ Form::open([ 'method'  => 'post', 'route' => [ 'roles.destroy']]) }}

          <div class="modal-header">
            <h5 class="modal-title"><b>Eliminar rol</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Está seguro(a) que desea deshabilitar este rol?

                  <h5 class="mt-3 mb-1" id="roleNameModalDisable"></h5>
                  <em><label id="roleDesciptionModalDisable"></label></em>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="role_idModalDisable" name="role_idModalDisable">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
          </div>
      {{ Form::close() }}
        </div>
      </div>
    </div>
    <!-- /Modal Delete-->
    <script type="text/javascript">
    btnEliminar=function(role_id, name, description){
      $('#role_idModalDisable').val(role_id);
      $('#roleNameModalDisable').text(name);
      $('#roleDesciptionModalDisable').text(description);
    };

    </script>
</div>
@endsection
