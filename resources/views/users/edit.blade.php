@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header"><h3 style="margin-bottom: 0px">Editar Guardia </h3> </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($user->image) }}" class="img-fluid rounded img-thumbnail" alt=".   Imagen usuario">
                        </div>
                        <div class="col-md-8">
                            {{ Form::model($user, ['enctype' => 'multipart/form-data','method'  => 'put', 'route' => [ 'users.update', $user, 'file'=>true]]) }}
                                @include('users.partials.form')
                                <div class="form-group float-right">
                                    <a href="{{ URL::previous() }}" class="btn btn-light mr-2">Volver</a>
                                    {{ Form::submit('Editar', ['class' => 'btn btn-primary']) }}
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
