@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" >
                <div class="card-header"><h3 style="margin-bottom: 0px">Nuevo rol </h3> </div>
                <div class="card-body" style="padding: 0.5rem;">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                        {{ Form::open(['route' => 'roles.store', 'file'=>true]) }}
                        @include('roles.partials.form')
                        <div class="form-group float-right">
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
