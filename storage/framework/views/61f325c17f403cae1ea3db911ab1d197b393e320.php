<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3 style="margin-bottom: 0px">Editar Rol </h3> </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <?php echo e(Form::model($role, ['method'  => 'put', 'route' => [ 'roles.update', $role, 'file'=>true]])); ?>

                                <?php echo $__env->make('roles.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <div class="form-group float-right mt-2">
                                    <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-light mr-2">Volver</a>
                                    <?php echo e(Form::submit('Guardar', ['class' => 'btn btn-primary'])); ?>

                                </div>

                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>