@extends('layouts.appTables')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    @can('users.create')
                    <a class="btn btn-primary float-right btn-md" href="{{route('users.create')}}" >Crear</a>
                    @endcan

                    <h3 style="margin-top: 5px; margin-bottom: 0px">Usuarios</h3>
                </div>

                <div class="card-body">

                    <table id="tablasAdministracion" class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                            <th >N°</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            @can('users.show')
                            <th style="width:10px"></th>
                            @endcan
                            @can('users.edit')
                            <th style="width:10px"></th>
                            @endcan
                            @can('users.destroy')
                            <th style="width:10px"></th>
                            @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)

                                @php ($cantidadRoles = 0)

                                @if($user->roles->count()==0)
                                    <tr style="color:red">
                                @else
                                    <tr>
                                @endif
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                @foreach($roles as $role)
                                    @if($role->user_id === $user->id)
                                        {{$role->role_name }} <br>
                                    @endif
                                @endforeach
                                </td>
                                @can('users.show')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="{{route('users.show', $user->id)}}" >Ver</a>
                                </td>
                                @endcan
                                @can('users.edit')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="{{route('users.edit', $user->id)}}" >Editar</a>
                                </td>
                                @endcan
                                @can('users.destroy')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                {{ Form::open([ 'method'  => 'put', 'route' => [ 'users.destroy', $user]]) }}
                                    {{ Form::submit('Deshabilitar', ['class' => 'btn btn-sm btn-danger']) }}
                                {{ Form::close() }}
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" class="init">
$(document).ready(function() {
  $('#tablasAdministracion').DataTable({
    "columnDefs": [{
        "orderable": false,
        "targets": [4,5,-1,-2]
    }],
    //"scrollY": "500px",
    "scrollCollapse": true,
    "language": {
     "sLengthMenu": "Ver _MENU_ registros",
      "search": "Buscar",
      "zeroRecords": "No se encontraron registros",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoFiltered": " (filtrado de un total de _MAX_ resultados)",
      "paginate": {
        "first": "Primero",
        "last":"Últimolabel",
        "next":"Siguiente",
        "previous":"Anterior",
      }
  }
  });
} );
</script>
@endsection
