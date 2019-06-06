@extends('layouts.app')

@section('content')
<style media="screen">
  .dataTables_length{
    float: left;
    margin-right: 30px;
  }
  .dt-buttons.btn-group{
    margin-top: -5px;
  }
</style>
<div class="container-fluid pr-4">
  <div class="row">
    <div class="col-2">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active px-2" id="grafico" data-toggle="pill" href="#v-grafico" role="tab" aria-controls="v-grafico" aria-selected="true">Gráfico de registros</a>
        <a class="nav-link px-2" id="historial" data-toggle="pill" href="#v-historial" role="tab" aria-controls="v-historial" aria-selected="false">Registro de Entrada/Salida</a>
        <a class="nav-link px-2" id="bicicletasInstitucion" data-toggle="pill" href="#v-bicicletas-institucion" role="tab" aria-controls="bicicletasInstitucion" aria-selected="false">Bicicletas en la institución</a>
        <a class="nav-link px-2" id="bicicletas" data-toggle="pill" href="#v-bicicletas" role="tab" aria-controls="bicicletas" aria-selected="false">Lista de bicicletas</a>
        <a class="nav-link px-2" id="duenos" data-toggle="pill" href="#v-duenos" role="tab" aria-controls="v-duenos" aria-selected="false">Lista de dueños</a>
        <a class="nav-link px-2" id="usuarios" data-toggle="pill" href="#v-usuarios" role="tab" aria-controls="v-usuarios" aria-selected="false">Lista de usuarios</a>
      </div>
      <hr>
      <div class="" id="filtroGroup">
        <h5 class="text-secondary">Filtro para gráficos</h5>
        <div class="form-group mb-0">
          <div class="input-group-prepend" style="width:27%; float:left">
            <label class="input-group-text" for="selectAnio" style="width:100%;">Año</label>
          </div>
            {{ Form::select('selectAnio', $anios->pluck('anio','anio'), date('Y'), ['id'=> 'selectAnio','style' => 'width:73%','class' => 'custom-select']) }}
        </div>

        <div class="input-group mb-0">
          <div class="input-group-prepend" style="width:27%;">
            <label class="input-group-text" for="selectMes" style="width:100%;">Mes</label>
          </div>
          <select class="custom-select" id="selectMes" class="" name="selectMes" style="width:73%;">
          </select>
        </div>
        <div class="input-group mb-0">
          <div class="input-group-prepend" style="width:27%;">
            <label class="input-group-text" for="selectDia" style="width:100%;">Día</label>
          </div>
          <select class="custom-select" class=""  id="selectDia" name="selectDia" style="width:73%;">
          </select>
          <button id="btnFiltroHoy" type="button" class="btn btn-primary mt-1" style="width:100%;">Hoy</button>
        </div>
      </div>

    </div>
    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
        <!-- Gráfico -->
        <div class="tab-pane fade show active" id="v-grafico" role="tabpanel" aria-labelledby="grafico">
          <nav class="pb-0">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-hora-tab" data-toggle="tab" href="#nav-hora" role="tab" aria-controls="nav-hora" aria-selected="true">Por Hora</a>
              <a class="nav-item nav-link" id="nav-diario-tab" data-toggle="tab" href="#nav-diario" role="tab" aria-controls="nav-diario" aria-selected="true">Diario</a>
              <a class="nav-item nav-link" id="nav-mensual-tab" data-toggle="tab" href="#nav-mensual" role="tab" aria-controls="nav-mensual" aria-selected="false">Mensual</a>
              <a class="nav-item nav-link" id="nav-anual-tab" data-toggle="tab" href="#nav-anual" role="tab" aria-controls="nav-anual" aria-selected="false">Anual</a>
            </div>
          </nav>
          <div class="card">

            <div class="card-body">

              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-hora" role="tabpanel" aria-labelledby="nav-hora-tab">
                  <div id="container-hora" style="width:100%; height:400px;"></div>
                </div>
                <div class="tab-pane fade " id="nav-diario" role="tabpanel" aria-labelledby="nav-diario-tab">
                  <div id="container-diario" style="width:100%; height:400px;"></div>
                </div>
                <div class="tab-pane fade" id="nav-mensual" role="tabpanel" aria-labelledby="nav-mensual-tab">
                  <div id="container-mensual" style="width:100%; height:400px;"></div>
                </div>
                <div class="tab-pane fade" id="nav-anual" role="tabpanel" aria-labelledby="nav-anual-tab">
                  <div id="container-anual" style="width:100%; height:400px;"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /Gráfico -->
        <!-- Historial -->
        <div class="tab-pane fade" id="v-historial" role="tabpanel" aria-labelledby="historial">
          <div class="card">
            <div class="card-body">
              <table id="tableHistorial" class="table table-small table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                  <thead>
                      <tr>
                        <th>N°</th>
                        <th>Bicicleta</th>
                        <th>Marca / Modelo</th>
                        <th>Usuario</th>
                        <th>Correo usuario</th>
                        <th>Acción</th>
                        <th>Fecha / Hora</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N°</th>
                      <th>Código bicicleta</th>
                      <th>bicicleta</th>
                      <th>Usuario</th>
                      <th>Correo usuario</th>
                      <th>Acción</th>
                      <th>Fecha / Hora</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Historial -->
        <!-- Bicicletas -->
        <div class="tab-pane fade" id="v-bicicletas" role="tabpanel" aria-labelledby="bicicletas">
          <div class="card">
            <div class="card-body">
              <table id="tableBicicleta" class="table table-hover table-small table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                  <thead>
                      <tr>
                        <th>N°</th>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N°</th>
                      <th>Código</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Color</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Bicicletas -->
        <!-- Bicicletas en la institucion-->
        <div class="tab-pane fade" id="v-bicicletas-institucion" role="tabpanel" aria-labelledby="bicicletasInstitucion">
          <div class="card">
            <div class="card-body">
              <table id="tableBicicletaInstitucion" class="table table-hover table-small  table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                  <thead>
                      <tr>
                        <th>N°</th>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N°</th>
                      <th>Código</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Color</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Bicicletas -->
        <!-- Duenos -->
        <div class="tab-pane fade" id="v-duenos" role="tabpanel" aria-labelledby="duenos">
          <div class="card">
            <div class="card-body">
              <table id="tableDueno" class="table table-hover table-small table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                <thead>
                  <tr>
                    <th >N°</th>
                    <th>Run</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th data-orderable="false">Bicicletas</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th >N°</th>
                    <th>Run</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th data-orderable="false">Bicicletas</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Duenos -->
        <!-- Usuarios -->
        <div class="tab-pane fade" id="v-usuarios" role="tabpanel" aria-labelledby="usuarios">
          <div class="card">
            <div class="card-body">
              <table id="tableUser" class="table table-hover table-small table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Usuarios -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" class="init">

function cargarSelect(anio,mes,dia){
  // CARGAMOS LOS DÍAS DEL MES DE HOY
  var date = new Date();
  var diasSemana  = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
  var meses       = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var dia = dia;

  $("#selectMes").empty();
  $("#selectDia").empty();

  if(mes!=null){
    var date = new Date(anio,mes);
    if(dia!=null){
      var date = new Date(anio,mes,dia);
    }
  }else{
    var date = new Date();
  }

  if(anio==null){
    $("#selectAnio").append('<option selected value='+date.getFullYear()+'>'+date.getFullYear()+'</option>');
  }

  // getMonth() = Mes -1 / ejemplo Abril = 04  getMonth()= 3
  for(var i=1; i<=12; i++){
    if(i == ((new Date().getMonth())+1) && mes==null){
        $("#selectMes").append('<option selected value='+i+'>'+meses[i-1]+'</option>');
    }else{
      if(mes!=null && mes == i){
        $("#selectMes").append('<option selected value='+i+'>'+meses[i-1]+'</option>');
      }else{
        $("#selectMes").append('<option value='+i+'>'+meses[i-1]+'</option>');
      }
    }
  }

  // Le restamos al mes porque getMonth() le resta 1, asi compensamos la fecha real
  if(mes!=null){
    var date = new Date(anio,mes-1);
    if(dia!=null){
      var date = new Date(anio,mes-1,dia);
    }
  }else{
    var date = new Date();
  }

  var primerDia   = (new Date(date.getFullYear(), date.getMonth(), 1)).getDate();
  var ultimoDia   = (new Date(date.getFullYear(), date.getMonth() + 1, 0)).getDate();
  var mesFecha = date.getMonth();
  var anioFecha = date.getFullYear();
  var diaFecha = date.getDate();

  for(var i=primerDia; i<=ultimoDia; i++){
    date = new Date(anioFecha,mesFecha,i);
    if((new Date()).getDate() == i && dia==null){
      $("#selectDia").append('<option selected value='+i+'>'+diasSemana[date.getDay()]+' '+i+'</option>');
    }else{
      if(dia!=null && dia==i){
        $("#selectDia").append('<option selected value='+i+'>'+diasSemana[date.getDay()]+' '+i+'</option>');
      }else{
        $("#selectDia").append('<option value='+i+'>'+diasSemana[date.getDay()]+' '+i+'</option>');
      }
    }
  }
}

$(document).ready(function() {
  var anio = null;
  var mes = null;
  var dia = null;

  // Cargamos los select para el filtro
  // Si estan null quedará con la fecha actual
  anio = $('select[id=selectAnio]').val();
  cargarSelect(anio,mes,dia);

  // Guardamos los datos de los select
  anio = $('select[id=selectAnio]').val();
  mes = $('select[id=selectMes]').val();
  dia = $('select[id=selectDia]').val();

  // Carga el gráfico principal (lo primeto que muestra en la pantalla de reportes)
  cargarGraficoHora(anio,mes,dia);

  // SELECT del filtro para gráficos
  $('select').click(function(){
    anio = $('select[id=selectAnio]').val();
    mes = $('select[id=selectMes]').val();
    dia = $('select[id=selectDia]').val();

    cargarSelect(anio,mes,dia);
    showHideGroupFilter();
  });

  $('#btnFiltroHoy').click(function(){
    cargarSelect((new Date()).getFullYear(),(new Date()).getMonth()+1,(new Date()).getDate());
    anio = $('select[id=selectAnio]').val();
    mes = $('select[id=selectMes]').val();
    dia = $('select[id=selectDia]').val();
    showHideGroupFilter();
    //alert(anio+'/'+mes+'/'+dia);
  });

  $('#historial').click(function(){
    $("#filtroGroup").css("display", "none");
  });
  $('#bicicletasInstitucion').click(function(){
    $("#filtroGroup").css("display", "none");
  });
  $('#bicicletas').click(function(){
    $("#filtroGroup").css("display", "none");
  });
  $('#duenos').click(function(){
    $("#filtroGroup").css("display", "none");
  });
  $('#usuarios').click(function(){
    $("#filtroGroup").css("display", "none");
  });
  $('#grafico').click(function(){
    $("#filtroGroup").css("display", "block");
  });
  /*
  * Reportes en tablas
  */
  $('#tableHistorial').DataTable({
    //  "scrollY": "500px",
    "columnDefs": [
      { "searchable": true, "targets": 1 },
      { "searchable": true, "targets": 2 },
      { "searchable": true, "targets": 3 }
    ],
    "processing": true,
    'serverSide': true,
    ajax: "{{route('registro.listar')}}",
    'columns':[
          {'data':'id'},
          {'data':'codigoVehiculo', 'name': 'vehiculos.codigo'},
          {'data':'vehiculo', 'name': 'marcas.description',  'name': 'vehiculos.modelo'},
          {'data':'usuario' , 'name': 'users.name'},
          {'data':'correoUsuario', 'name': 'users.email'},
          {'data':'accion'},
          {'data':'created_at'},
    ],

    "order": [[ 0, "desc" ]],
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
      },
      buttons: {
              copyTitle: 'Copiado en portapapeles',
              copySuccess: {
                  _: '%d lineas copiadas',
                  1: '1 linea copiada'
              }
          },
    },
    "dom": 'lBfrtip',
    buttons: [
      { extend: 'copy', text: 'Copiar tabla' },
      { extend: 'excel', text: 'Excel', title: 'Historial de registros' }
    ],

    "lengthMenu": [[10,100, 1000, 2500, 5000], [10,100, 1000, 2500, 5000]],

  });
  $('#tableBicicletaInstitucion').DataTable({
    "processing": true,
    'serverSide': true,
    "columnDefs": [
      { "searchable": true, "targets": 2 }
    ],
    ajax: "{{route('vehiculos.enEstablecimiento')}}",
    'columns':[
          {'data':'id'},
          {'data':'codigo',},
          {'data':'marca', 'name': 'marcas.description'},
          {'data':'modelo'},
          {'data':'color'},
    ],
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
      },
      buttons: {
              copyTitle: 'Copiado en portapapeles',
              copySuccess: {
                  _: '%d lineas copiadas',
                  1: '1 linea copiada'
              }
          },
    },
    "dom": 'lBfrtip',
    buttons: [
      { extend: 'copy', text: 'Copiar tabla' },
      { extend: 'excel', text: 'Excel', title: 'Bicicletas en la institución' }
    ],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
  });
  $('#tableBicicleta').DataTable({
    "processing": true,
    'serverSide': true,
    "columnDefs": [
      { "searchable": true, "targets": 2 }
    ],
    ajax: "{{route('vehiculos.listar')}}",
    'columns':[
          {'data':'id'},
          {'data':'codigo'},
          {'data':'marca', 'name': 'marcas.description'},
          {'data':'modelo'},
          {'data':'color'},
    ],
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
      },
      buttons: {
              copyTitle: 'Copiado en portapapeles',
              copySuccess: {
                  _: '%d lineas copiadas',
                  1: '1 linea copiada'
              }
          },
    },
    "dom": 'lBfrtip',
    buttons: [
      { extend: 'copy', text: 'Copiar tabla' },
      { extend: 'excel', text: 'Excel', title: 'Bicicletas' }
    ],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
  });
  $('#tableDueno').DataTable({
    "processing": true,
    'serverSide': true,
    ajax: "{{route('duenos.listar')}}",
    'columns':[
          {'data':'id'},
          {'data':'rut'},
          {'data':'nombre'},
          {'data':'correo'},
          {'data':'celular'},
          {'data':'bicicletas'},
    ],
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
      },
      buttons: {
              copyTitle: 'Copiado en portapapeles',
              copySuccess: {
                  _: '%d lineas copiadas',
                  1: '1 linea copiada'
              }
          },
    },
    "dom": 'lBfrtip',
    buttons: [
      { extend: 'copy', text: 'Copiar tabla' },
      { extend: 'excel', text: 'Excel', title: 'Dueños' }
    ],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]

  });
  $('#tableUser').DataTable({
    "processing": true,
    'serverSide': true,
    ajax: "{{route('users.listar')}}",
    'columns':[
          {'data':'id'},
          {'data':'nombre', 'name': 'users.name'},
          {'data':'email'},
          {'data':'rol', 'name': 'roles.name'},
    ],
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
      },
      buttons: {
              copyTitle: 'Copiado en portapapeles',
              copySuccess: {
                  _: '%d lineas copiadas',
                  1: '1 linea copiada'
              }
          },
    },
    "dom": 'lBfrtip',
    buttons: [
      { extend: 'copy', text: 'Copiar tabla' },
      { extend: 'excel', text: 'Excel', title: 'Usuarios' }
    ],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]

  });
  /*
  * /Reportes en tablas
  */


  $('#nav-diario-tab').click(function(){
    cargarGraficoDiario(anio,mes);
    cambiarEstadoSelect(true,true,false);
    $('#btnFiltroHoy').css('display','block');
    $('#btnFiltroHoy').text('Este mes');
  });

  $('#nav-hora-tab').click(function(){
    cargarGraficoHora(anio,mes,dia);
    cambiarEstadoSelect(true,true,true);
    $('#btnFiltroHoy').css('display','block');
    $('#btnFiltroHoy').text('Hoy');
  });

  $('#nav-mensual-tab').click(function(){
    cargarGraficoMensual(anio);
    cambiarEstadoSelect(true,false,false);
    $('#btnFiltroHoy').css('display','block');
    $('#btnFiltroHoy').text('Este año');
  });

  $('#nav-anual-tab').click(function(){
    cargarGraficoAnual();
    cambiarEstadoSelect(false,false,false);
    $('#btnFiltroHoy').css('display','none');
  });
});


function cargarGraficoHora(anio,mes,dia){
  var url = '{{url("")}}'+'/grafico/'+anio+'/'+mes+'/'+dia;
  $.get(url, function(data){
    var datos = jQuery.parseJSON(data);
    var ragoHoras = datos.ragoHoras;
    var entradas = datos.entradas;
    var salidas = datos.salidas;

    var myChart = Highcharts.chart('container-hora',

    {
      chart: {
        type: 'areaspline', // spline
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 0,
            viewDistance: 500,
            depth: 5
        }
      },
      title: {
      text: 'Registro de entradas y salidas'
    },
    credits: {
      enabled: false
    },
    subtitle: {
      text: 'Registro por hora [ '+(new Date(anio,mes-1,dia)).toLocaleDateString("es-CL",{weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'})+' ]'
    },
    xAxis: {
      tickWidth: 0,
      type: '',
      categories: ragoHoras,
      title:{
      text: 'Horas'
    },
    labels: {
        skew3d: true,
    },
    crosshair: true
    },
    yAxis: {
      title: {
      text: 'Cantidad de registros',
      skew3d: true
      },
      plotLines:[{
        value: 0,
        width: 1,
        color: '#0f0'
      }]
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
    plotOptions: {
     series: {
       label: {
           connectorAllowed: false
       },
     pointStart: 0
     }
   },
   series: [
     {name:'Entradas', data: entradas },
     {name:'Salidas', data: salidas, color: 'RGBA(240, 128, 128,0.7)' }
   ],
  exporting: {
    buttons: {
        contextButton: {
            menuItems: ['viewFullscreen','','downloadPNG', 'downloadJPEG', '','downloadPDF','downloadXLS']
        }
    },
  },
  lang: {
      viewFullscreen: 'Pantalla completa',
      downloadPNG: 'Descargar PNG',
      downloadJPEG: 'Descargar JPEG',
      downloadPDF: 'Descargar PDF',
      downloadXLS: 'Descargar EXCEL',
      contextButtonTitle: 'Menú'
  },

  });
  });
}
function cargarGraficoDiario(anio,mes){
  var url = '{{url("")}}'+'/grafico/'+anio+'/'+mes;
  $.get(url, function(data){
    var datos = jQuery.parseJSON(data);
    var totalDias = datos.totalDias;
    var entradas = datos.entradas;
    var salidas = datos.salidas;

    var myChart = Highcharts.chart('container-diario',
    {
      chart: {
        type: 'column', // spline
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 0,
            viewDistance: 500,
            depth: 5
        }
      },
      title: {
      text: 'Registro de entradas y salidas'
    },
    credits: {
      enabled: false
    },
    subtitle: {
      text: 'Registro diario, '+(new Date(anio,mes-1)).toLocaleDateString("es-CL",{year: 'numeric', month: 'long'})
    },
    xAxis: {
      tickWidth: 0,
      type: 'day',
      min:1,
      categories: [],
      title:{
      text: 'Días'
    },
    labels: {
        skew3d: true,
    },
    crosshair: true
    },
    yAxis: {
      title: {
      text: 'Cantidad de registros',
      skew3d: true
      },
      plotLines:[{
        value: 0,
        width: 1,
        color: '#0f0'
      }]
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
    plotOptions: {
     series: {
       label: {
           connectorAllowed: false
       },
     pointStart: 0
     }
   },
   series: [
     {name:'Entradas', data: entradas },
     {name:'Salidas', data: salidas, color: 'RGBA(240, 128, 128,0.7)' }
   ],
  exporting: {
    buttons: {
        contextButton: {
            menuItems: ['viewFullscreen','','downloadPNG', 'downloadJPEG', '','downloadPDF','downloadXLS']
        }
    },
  },
  lang: {
      viewFullscreen: 'Pantalla completa',
      downloadPNG: 'Descargar PNG',
      downloadJPEG: 'Descargar JPEG',
      downloadPDF: 'Descargar PDF',
      downloadXLS: 'Descargar EXCEL',
      contextButtonTitle: 'Menú'
  },

  });
});
}
function cargarGraficoMensual(anio){
  var url = '{{url("")}}/grafico/'+anio;
  $.get(url, function(data){
    var datos = jQuery.parseJSON(data);
    var meses = datos.meses;
    var entradas = datos.entradas;
    var salidas = datos.salidas;

    var myChart = Highcharts.chart('container-mensual',

    {
      chart: {
        type: 'column', // spline / areaspline /column
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 0,
            viewDistance: 500,
            depth: 5
        }
      },
      title: {
      text: 'Registro de entradas y salidas'
    },
    credits: {
      enabled: false
    },
    subtitle: {
      text: 'Registro mensual '+anio
    },
    xAxis: {
      tickWidth: 0,
      type: 'month',
      categories: meses,
      title:{
      text: 'Meses'
    },
    labels: {
        skew3d: true,
    },
    crosshair: true
    },
    yAxis: {
      title: {
      text: 'Cantidad de registros',
      skew3d: true
      },
      plotLines:[{
        value: 0,
        width: 1,
        color: '#0f0'
      }]
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
    plotOptions: {
     series: {
       label: {
           connectorAllowed: false
       },
     pointStart: 0
     }
   },
   series: [
     {name:'Entradas', data: entradas },
     {name:'Salidas', data: salidas, color: 'RGBA(240, 128, 128,0.7)' }
   ],
  exporting: {
    buttons: {
        contextButton: {
            menuItems: ['viewFullscreen','','downloadPNG', 'downloadJPEG', '','downloadPDF','downloadXLS']
        }
    },
  },
  lang: {
      viewFullscreen: 'Pantalla completa',
      downloadPNG: 'Descargar PNG',
      downloadJPEG: 'Descargar JPEG',
      downloadPDF: 'Descargar PDF',
      downloadXLS: 'Descargar EXCEL',
      contextButtonTitle: 'Menú'
  },

  });
  });
}

function cargarGraficoAnual(){
  var url = '{{url("")}}/grafico/';
  $.get(url, function(data){
    var datos = jQuery.parseJSON(data);
    var anios = datos.anios;
    var entradas = datos.entradas;
    var salidas = datos.salidas;

    var myChart = Highcharts.chart('container-anual',

    {
      chart: {
        type: 'column', // spline / areaspline /column
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 0,
            viewDistance: 500,
            depth: 5
        }
      },
      title: {
      text: 'Registro de entradas y salidas'
    },
    credits: {
      enabled: false
    },
    subtitle: {
      text: 'Registro anual'
    },
    xAxis: {
      tickWidth: 0,
      type: 'year',
      categories: anios,
      title:{
      text: 'Años'
    },
    labels: {
        skew3d: true,
    },
    crosshair: true
    },
    yAxis: {
      title: {
      text: 'Cantidad de registros',
      skew3d: true
      },
      plotLines:[{
        value: 0,
        width: 1,
        color: '#0f0'
      }]
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
    plotOptions: {
     series: {
       label: {
           connectorAllowed: false
       },
     pointStart: 0
     }
   },
   series: [
     {name:'Entradas', data: entradas },
     {name:'Salidas', data: salidas, color: 'RGBA(240, 128, 128,0.7)' }
   ],
  exporting: {
    buttons: {
        contextButton: {
            menuItems: ['viewFullscreen','','downloadPNG', 'downloadJPEG', '','downloadPDF','downloadXLS']
        }
    },
  },
  lang: {
      viewFullscreen: 'Pantalla completa',
      downloadPNG: 'Descargar PNG',
      downloadJPEG: 'Descargar JPEG',
      downloadPDF: 'Descargar PDF',
      downloadXLS: 'Descargar EXCEL',
      contextButtonTitle: 'Menú'
  },

  });
  });
}

function cambiarEstadoSelect(anio,mes,dia){
  if(anio){
    $('select[id=selectAnio]').prop('disabled', false);
  }else{
    $('select[id=selectAnio]').prop('disabled', true);
  }
  if(mes){
    $('select[id=selectMes]').prop('disabled', false);
  }else{
    $('select[id=selectMes]').prop('disabled', true);
  }
  if(dia){
    $('select[id=selectDia]').prop('disabled', false);
  }else{
    $('select[id=selectDia]').prop('disabled', true);
  }
}

function showHideGroupFilter(){
  if ($('#nav-hora-tab').hasClass('active')){
      $('#nav-hora-tab').click();
  }
  if ($('#nav-diario-tab').hasClass('active')){
      $('#nav-diario-tab').click();
  }
  if ($('#nav-mensual-tab').hasClass('active')){
      $('#nav-mensual-tab').click();
  }
  if ($('#nav-anual-tab').hasClass('active')){
      $('#nav-anual-tab').click();
  }

}


</script>
<script  src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script  src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

@endsection
