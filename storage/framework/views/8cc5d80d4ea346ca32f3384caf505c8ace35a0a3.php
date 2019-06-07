<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <?php if (\Shinobi::can('vehiculos.create')): ?>
                    <a class="btn btn-primary float-right btn-md" href="<?php echo e(route('vehiculos.create')); ?>" >Crear</a>
                    <?php endif; ?>

                    <h3 style="margin-top: 5px; margin-bottom: 0px">Dueños</h3>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <table id="tablasAdministracionDuenos" class="table table-hovertable-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                        <thead>
                            <tr>
                            <th >N°</th>
                            <th data-orderable="false">Imagen</th>
                            <th>Run</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th data-orderable="false">Bicicletas</th>
                            <th data-orderable="false"></th>

                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" class="init">
$(document).ready(function() {
  $('#tablasAdministracionDuenos').DataTable({
    "processing": true,
    'serverSide': true,
    ajax: "<?php echo e(route('duenos.listar')); ?>",

    'columns':[
          {'data':'id'},
          {'data':'imagen'},
          {'data':'rut'},
          {'data':'nombre'},
          {'data':'correo'},
          {'data':'celular'},
          {'data':'bicicletas'},
          {'data':'accion'},
    ],
    //"scrollY": "500px",
    "scrollCollapse": true,
    "language": {
     "sLengthMenu": "Ver _MENU_ registros",
      "search": "Buscar",
      "zeroRecords": "No se encontraron registros",
      "sInfo": "Mostrando _TOTAL_ registros",
      "sInfoFiltered": " (filtrado de un total de _MAX_ resultados)",
      "paginate": {
        "first": "Primero",
        "last":"Últimolabel",
        "next":"Siguiente",
        "previous":"Anterior",
      }
  }
  });
  $('.dataTables_length').addClass('bs-select');
} );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>