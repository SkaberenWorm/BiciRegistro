@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 style="margin-bottom: 0px">Detalle Rol </h3> 
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            Nombre: {{$role->name}} <br>
                            Slug: {{$role->slug}} <br>
                            Descripción: {{$role->description}}
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
@endsection
