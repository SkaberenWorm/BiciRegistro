<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" >
                <div class="card-header"><h3 style="margin-bottom: 0px">Registrar bicicleta </h3> </div>
                <?php echo e(Form::open(['enctype' => 'multipart/form-data','route' => 'vehiculos.store', 'file'=>true])); ?>

                <div class="card-body" style="padding: 0.5rem;">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header"><h5 style="margin-bottom: 0px">Bicicleta </h5> </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo $__env->make('vehiculos.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h5 style="margin-bottom: 0px">Dueño </h5> </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo $__env->make('vehiculos.partials.duenoForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group float-right mt-2">
                        <a href="<?php echo e(route('vehiculos.index')); ?>" class="btn btn-light mr-2">Volver</a>
                        <?php echo e(Form::submit('Guardar', ['class' => 'btn btn-primary'])); ?>

                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>