@extends('layouts.appTables')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    @can('vehiculos.create')
                    <a class="btn btn-primary float-right btn-md" href="{{route('vehiculos.create')}}" >Crear</a>
                    @endcan

                    <h3 style="margin-top: 5px; margin-bottom: 0px">Dueños</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="tablasAdministracion" class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                            <th >N°</th>
                            <th>Imagen</th>
                            <th>Run</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th>Bicicletas</th>
                            @can('duenos.show')
                            <th style="width:10px"></th>
                            @endcan
                            @can('duenos.edit')
                            <th style="width:10px"></th>
                            @endcan

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($duenos as $dueno)
                            @if($dueno->vehiculos->count()==0)
                                <tr style="color:red">
                            @else
                                <tr>
                            @endif
                                <td>{{$dueno->id}}</td>
                                <td style="padding: 0.05rem 0.75rem 0.05rem 0.75rem; vertical-align: inherit;">
                                    <img src="{{ Storage::url($dueno->image) }}" class="img-fluid rounded " style="max-height: 35px" alt="">
                                </td>
                                <td>{{$dueno->rut}}</td>
                                <td>{{$dueno->nombre}}</td>
                                <td>{{$dueno->correo}}</td>
                                <td>+569&nbsp{{$dueno->celular}}</td>
                                <td  class="text-center">{{$dueno->vehiculos->count()}}</td>

                                @can('duenos.show')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="{{route('duenos.show', $dueno->id)}}" >Ver</a>
                                </td>
                                @endcan
                                @can('duenos.edit')
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="{{route('duenos.edit', $dueno->id)}}" >Editar</a>
                                </td>
                                @endcan

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $duenos->render() }}
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
        "targets": [1,7,8,-1,-2]
    }],
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
