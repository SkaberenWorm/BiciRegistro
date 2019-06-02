<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    <?php if (\Shinobi::can('roles.create')): ?>
                    <a class="btn btn-primary float-right btn-md" href="<?php echo e(route('roles.create')); ?>" >Crear</a>
                    <?php endif; ?>

                    <h3 style="margin-top: 5px; margin-bottom: 0px">Roles</h3>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                        <thead>
                            <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>URL (slug)</th>
                            <th>Descipción</th>
                            <th>Usuarios</th>
                            <?php if (\Shinobi::can('roles.show')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            <?php if (\Shinobi::can('roles.edit')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            <?php if (\Shinobi::can('roles.destroy')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($role->users->where('activo',true)->count()==0): ?>
                                <tr style="color:red">
                            <?php else: ?>
                                <tr>
                            <?php endif; ?>
                                <td><?php echo e($role->id); ?></td>
                                <td><?php echo e($role->name); ?></td>
                                <td><?php echo e($role->slug); ?></td>
                                <td><?php echo e($role->description? : "Sin descripción"); ?></td>
                                <td class="text-center" style="width:10%;"><?php echo e($role->users->where('activo',true)->count()); ?></td>
                                <?php if (\Shinobi::can('roles.show')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="<?php echo e(route('roles.show', $role->id)); ?>" >Ver</a>
                                </td>
                                <?php endif; ?>
                                <?php if (\Shinobi::can('roles.edit')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="<?php echo e(route('roles.edit', $role->id)); ?>" >Editar</a>
                                </td>
                                <?php endif; ?>
                                <?php if (\Shinobi::can('roles.destroy')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                  <button type="button" name="button" onclick="btnEliminar('<?php echo e($role->id); ?>','<?php echo e($role->name); ?>','<?php echo e($role->description); ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarRoleModal">Eliminar</button>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete-->
    <div class="modal fade" id="eliminarRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <?php echo e(Form::open([ 'method'  => 'post', 'route' => [ 'roles.destroy']])); ?>


          <div class="modal-header">
            <h5 class="modal-title"><b>Eliminar rol</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Está seguro(a) que desea deshabilitar este rol?

                  <h5 class="mt-3 mb-1" id="roleNameModalDisable"></h5>
                  <em><label id="roleDesciptionModalDisable"></label></em>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="role_idModalDisable" name="role_idModalDisable">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <?php echo e(Form::submit('Eliminar', ['class' => 'btn btn-danger'])); ?>

          </div>
      <?php echo e(Form::close()); ?>

        </div>
      </div>
    </div>
    <!-- /Modal Delete-->
    <script type="text/javascript">
    btnEliminar=function(role_id, name, description){
      $('#role_idModalDisable').val(role_id);
      $('#roleNameModalDisable').text(name);
      $('#roleDesciptionModalDisable').text(description);
    };

    </script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>