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
                          <table class="table responsive-md">
                            <tbody>
                              <tr>
                                <th scope="row">Nombre</th>
                                <td>{{ $user->name }}</td>
                              </tr>

                              <tr>
                                <th scope="row">Correo</th>
                                <td>{{ $user->email }}</td>
                              </tr>
                              <tr>
                                @if($user->roles->count() > 1)
                                <th >Roles</th>
                                @else
                                <th >Rol</th>
                                @endif

                                <td>
                                  @foreach($user->roles as $role)
                                    <a class="" href="{{route('roles.show', $role->id)}}" >
                                    {{$role->name}}  <em>({{ $role->description? : "sin descripción" }})</em>
                                  </a><br>
                                  @endforeach
                                </td>
                              </tr>
                            </tbody>
                          </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
