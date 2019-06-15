<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-light float-right">Volver</a>
                    <h3 style="margin-bottom: 0px">Detalle usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        <img src="<?php echo e(Storage::url($user->image)); ?>" class="img-fluid rounded img-thumbnail" alt=".   Imagen usuario">
                        </div>
                        <div class="col-md-9">
                          <table class="table responsive-md">
                            <tbody>
                              <tr>
                                <th scope="row">Nombre</th>
                                <td><?php echo e($user->name); ?></td>
                              </tr>

                              <tr>
                                <th scope="row">Correo</th>
                                <td><?php echo e($user->email); ?></td>
                              </tr>
                              <tr>
                                <?php if($user->roles->count() > 1): ?>
                                <th >Roles</th>
                                <?php else: ?>
                                <th >Rol</th>
                                <?php endif; ?>

                                <td>
                                  <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="" href="<?php echo e(route('roles.show', $role->id)); ?>" >
                                    <?php echo e($role->name); ?>  <em>(<?php echo e($role->description? : "sin descripción"); ?>)</em>
                                  </a><br>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>