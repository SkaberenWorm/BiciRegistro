@extends('layouts.app')

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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Rol</th>
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
                                @foreach($roles as $role)
                                    @if($role->user_id === $user->id && !empty($role->role_name))
                                        @php ($cantidadRoles++)
                                    @endif
                                @endforeach
                                @if($cantidadRoles==0)
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
                                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'users.destroy', $user]]) }}
                                    {{ Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) }}
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
@endsection
