<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <!--div class="card-header">
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-light float-right">Volver</a>
                    <h3 class="pb-0 mb-0 mt-1">Mi perfil</h3>
                </div-->
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-4 px-5">
                        <img src="<?php echo e(Storage::url($user->image)); ?>" class="img-fluid rounded img-thumbnail rounded-circle" alt=".   Imagen usuario">
                        </div>

                        <div class="col-sm-4 ">
                          <div class="my-3">
                            <h5 class="mb-3"><b><?php echo e($user->name); ?></b></h5>
                            <strong class="text-primary my-2"><?php echo e($user->email); ?></strong> <br>
                            <div class="my-2">
                              <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="" href="<?php echo e(route('roles.show', $role->id)); ?>" >
                                <?php echo e($role->name); ?>  <em>(<?php echo e($role->description? : "sin descripción"); ?>)</em>
                              </a><br>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                          </div>
                        </div>
                        <div class="col-sm-4 mt-3 text-right">
                          <a href="#" data-toggle="modal" data-target="#cambiarPassword" class="btn btn-primary">
                            <strong class="" >Cambiar contraseña</strong>
                            <i class="fas fa-pencil-alt text-primary fa-sm ml-2"></i>
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Modal Password-->
  <div class="modal" id="cambiarPassword" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?php echo e(Form::open([ 'method'  => 'post', 'route' => [ 'users.cambiarPassword']])); ?>

        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Cambiar contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5 py-4">

          <div class="form-group">
            <label for="passwordActual">Contraseña actual</label>
            <input type="password" class="form-control" id="passwordActual" name="passwordActual" placeholder="">
          </div>
          <div class="form-group">
            <label for="passwordNueva">Nueva contraseña</label>
            <input type="password" class="form-control" id="passwordNueva" name="passwordNueva" placeholder="">
          </div>
          <div class="form-group">
            <label for="new-password-confirm">Confirme contraseña</label>
            <input type="password" class="form-control" id="new-password-confirm" name="new-password-confirm" placeholder="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <?php echo e(Form::submit('Guardar', ['class' => 'btn btn-primary'])); ?>

        </div>
        <?php echo e(Form::close()); ?>

      </div>
    </div>
  </div>
<!-- /Modal Password-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>