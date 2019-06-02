<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-light float-right">Volver</a>
                    <h3 style="margin-bottom: 0px">Detalle Rol </h3>
                </div>
                <div class="card-body">
                  <table class="table responsive-md">
                    <tbody>
                        <th scope="row" style="width:30%;">Nombre</th>
                        <td><?php echo e($role->name); ?></td>
                      </tr>
                      <tr>
                        <th scope="row">URL</th>
                        <td><?php echo e($role->slug); ?></td>
                      </tr>
                      <tr>
                        <th scope="row">Descripción</th>
                        <td><?php echo e($role->description? : 'Sin descripción'); ?></td>
                      </tr>
                      <tr>
                        <th scope="row">Permiso especial</th>
                        <td><?php echo e($role->special? $role->special==='ninguno'?'Sin permisos especiales':$role->special : 'Sin permisos especiales'); ?></td>
                      </tr>
                      <tr>
                        <th >Permisos</th>

                        <td>
                          <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($permission->name); ?>

                            <em class="text-secondary">(<?php echo e($permission->description?:'Sin descripción'); ?>)</em> <br>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php if($role->permissions->count() <= 0): ?>
                              Sin permisos
                          <?php endif; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>