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

                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>URL (slug)</th>
                            <th>Descipción</th>
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
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>{{$role->description? : "Sin descripción"}}</td>
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
                                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'roles.destroy', $role]]) }}
                                    {{ Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) }}
                                {{ Form::close() }}
                                </td>
                                @endcan
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
