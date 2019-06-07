<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                  <h4 class="mb-0">Hola <?php echo e(Auth::user()->name); ?></h4>
                </div>
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="list-group col-sm-10">
                      <button type="button" class="list-group-item list-group-item-action active">
                        <h5 class="text-while mb-0">Empecemos</h5>
                      </button>
                      <?php if (\Shinobi::can('vehiculos.index')): ?>
                        <a class="list-group-item list-group-item-action" href="<?php echo e(route('vehiculos.index')); ?>">Listar bicicletas</a>
                      <?php endif; ?>
                      <?php if (\Shinobi::can('vehiculos.create')): ?>
                        <a class="list-group-item list-group-item-action" href="<?php echo e(route('vehiculos.create')); ?>">Registrar nueva bicicletas</a>
                      <?php endif; ?>
                      <?php if (\Shinobi::can('registros.index')): ?>
                        <a class="list-group-item list-group-item-action" href="<?php echo e(route('registro.index')); ?>">Registrar entrada y salida de una bicicleta</a>
                      <?php endif; ?>
                      <?php if (\Shinobi::can('registros.tercero')): ?>
                        <a class="list-group-item list-group-item-action" href="<?php echo e(route('registro.crearCodigoTercero')); ?>">Generar código para retiro por terceros</a>
                      <?php endif; ?>
                      <?php if (\Shinobi::can('registros.reporte')): ?>
                        <a class="list-group-item list-group-item-action" href="<?php echo e(route('registro.reporte')); ?>">Visualizar reportes</a>
                      <?php endif; ?>

                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>