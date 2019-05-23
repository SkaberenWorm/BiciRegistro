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

                    <table id="tablasAdministracion" class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                            <th >N°</th>
                            <th>Imagen</th>
                            <th>Run</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th>Bicicletas</th>
                            <?php if (\Shinobi::can('duenos.show')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            <?php if (\Shinobi::can('duenos.edit')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $duenos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dueno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($dueno->vehiculos->where('activo',true)->count()==0): ?>
                                <tr style="color:red">
                            <?php else: ?>
                                <tr>
                            <?php endif; ?>
                                <td><?php echo e($dueno->id); ?></td>
                                <td style="padding: 0.05rem 0.75rem 0.05rem 0.75rem; vertical-align: inherit;">
                                    <img src="<?php echo e(Storage::url($dueno->image)); ?>" class="img-fluid rounded " style="max-height: 35px" alt="">
                                </td>
                                <td><?php echo e($dueno->rut); ?></td>
                                <td><?php echo e($dueno->nombre); ?></td>
                                <td><?php echo e($dueno->correo); ?></td>
                                <td>+569&nbsp<?php echo e($dueno->celular); ?></td>
                                <td  class="text-center"><?php echo e($dueno->vehiculos->where('activo',true)->count()); ?></td>

                                <?php if (\Shinobi::can('duenos.show')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="<?php echo e(route('duenos.show', $dueno->id)); ?>" >Ver</a>
                                </td>
                                <?php endif; ?>
                                <?php if (\Shinobi::can('duenos.edit')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="<?php echo e(route('duenos.edit', $dueno->id)); ?>" >Editar</a>
                                </td>
                                <?php endif; ?>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($duenos->render()); ?>

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
      }
  }
  });
} );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appTables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>