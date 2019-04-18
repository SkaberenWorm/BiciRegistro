@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card">
                <div class="card-header"><h3 style="margin-bottom: 0px">Editar Guardia </h3> </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('images/user.png') }}" class="img-fluid rounded img-thumbnail" alt=".   Imagen usuario">
                        </div>
                        <div class="col-md-8">
                            {{ Form::model($user, ['method'  => 'put', 'route' => [ 'users.update', $user, 'file'=>true]]) }}
                                @include('users.partials.form')
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        {{ Form::label('role','Roles') }}
                                    </div>
                                    <div class="col-sm-10">
                                       <ul class="list-unstyled">
                                       
                                       @foreach($roles as $role)
                                            @php($cantidadRoles = 0)
                                            @foreach($roleUsers as $roleUser)
                                                @if($roleUser->role_id === $role->id && $roleUser->user_id === $user->id)
                                                    @php ($cantidadRoles++)
                                                @endif
                                            @endforeach
                                            <li>
                                                <label>
                                            @if($cantidadRoles<=0)
                                                {{ Form::checkbox('roles[]', $role->id, null ) }}
                                            @else
                                                {{ Form::checkbox('roles[]', $role->id, $role) }}
                                            @endif
                                                    {{ $role->name}} <em> ({{$role->description? : 'sin descripción'}}) </em>
                                                </label>
                                            </li>
                                        @endforeach

                                       
                                       </ul>
                                    </div>
                                </div>
                                

                                <div class="form-group float-right">
                                    <a href="{{route('users.index')}}" class="btn btn-light mr-2">Volver</a>
                                    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
                                </div>
                                
                            {{ Form::close() }}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
