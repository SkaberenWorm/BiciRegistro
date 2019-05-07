@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card" >
                <div class="card-header"><h3 style="margin-bottom: 0px">Nuevo usuario </h3> </div>

                <div class="card-body" style="padding: 0.5rem;">
                    <div class="row">
                        <div class="col-md-12">
                        {{ Form::open(['route' => 'users.store', 'file'=>true]) }}
                        @include('users.partials.form')
                        <div class="form-group float-right">
                            <a href="{{route('duenos.index')}}" class="btn btn-light mr-2">Volver</a>
                            {{ Form::submit('Crear', ['class' => 'btn btn-primary']) }}
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
