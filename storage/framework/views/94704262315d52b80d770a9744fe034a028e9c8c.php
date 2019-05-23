<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    <?php if (\Shinobi::can('users.create')): ?>
                    <a class="btn btn-primary float-right btn-md" href="<?php echo e(route('users.create')); ?>" >Crear</a>
                    <?php endif; ?>

                    <h3 style="margin-top: 5px; margin-bottom: 0px">Usuarios</h3>
                </div>

                <div class="card-body">

                    <table id="tablasAdministracion" class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                            <th >N°</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <?php if (\Shinobi::can('users.show')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            <?php if (\Shinobi::can('users.edit')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            <?php if (\Shinobi::can('users.destroy')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php ($cantidadRoles = 0); ?>

                                <?php if($user->roles->count()==0): ?>
                                    <tr style="color:red">
                                <?php else: ?>
                                    <tr>
                                <?php endif; ?>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($role->user_id === $user->id): ?>
                                        <?php echo e($role->role_name); ?> <br>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <?php if (\Shinobi::can('users.show')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="<?php echo e(route('users.show', $user->id)); ?>" >Ver</a>
                                </td>
                                <?php endif; ?>
                                <?php if (\Shinobi::can('users.edit')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="<?php echo e(route('users.edit', $user->id)); ?>" >Editar</a>
                                </td>
                                <?php endif; ?>
                                <?php if (\Shinobi::can('users.destroy')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                <?php echo e(Form::open([ 'method'  => 'put', 'route' => [ 'users.destroy', $user]])); ?>

                                    <?php echo e(Form::submit('Deshabilitar', ['class' => 'btn btn-sm btn-danger'])); ?>

                                <?php echo e(Form::close()); ?>

                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($users->render()); ?>

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
        "targets": [4,5,-1,-2]
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