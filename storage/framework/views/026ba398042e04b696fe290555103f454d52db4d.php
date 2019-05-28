<?php $__env->startSection('content'); ?>
<style media="screen">
.cuadrado {
     width: 25px;
     height: 25px;
     -moz-border-radius: 50%;
     -webkit-border-radius: 50%;
     border: 1px solid #555;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3 style="margin-bottom: 0px">Editar bicicleta </h3> </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo e(Storage::url($vehiculo->image)); ?>" class="img-fluid rounded img-thumbnail" alt=".   Imagen bicicleta">
                        </div>
                        <div class="col-md-8">
                            <?php echo e(Form::model($vehiculo, ['enctype' => 'multipart/form-data','method'  => 'put', 'route' => [ 'vehiculos.update', $vehiculo, 'file'=>true]])); ?>

                                <?php echo $__env->make('vehiculos.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <div class="form-group float-right mt-2">
                                <a href="<?php echo e(route('vehiculos.index')); ?>" class="btn btn-light mr-2">Volver</a>
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
<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
<script type="text/javascript">
$("#selectMarca").select2({
        allowClear: false
    })

  function enviarForm() {
     $("#formEnviar").submit();
   }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>