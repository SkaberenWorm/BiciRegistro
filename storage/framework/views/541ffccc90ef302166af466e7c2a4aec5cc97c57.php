<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-light float-right">Volver</a>
                    <h3 style="margin-bottom: 0px">Detalle dueño</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        <img src="<?php echo e(Storage::url($dueno->image)); ?>" class="img-fluid rounded img-thumbnail" alt=".   Imagen dueño">
                        </div>
                        <div class="col-md-9">
                          <table class="table responsive-md">
                            <tbody>
                              <tr>
                                <th scope="row">Run</th>
                                <td><?php echo e($dueno->rut); ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Nombre</th>
                                <td><?php echo e($dueno->nombre); ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Área</th>
                                <td><?php echo e($dueno->tipoDueno->description); ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Correo</th>
                                <td><?php echo e($dueno->correo); ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Celular</th>
                                <td>(+56) <?php echo e($dueno->celular); ?></td>
                              </tr>
                              <tr>
                                <?php if($dueno->vehiculos->where('activo',true)->count() > 1): ?>
                                <th >Bicicletas</th>
                                <?php else: ?>
                                <th >Bicicleta</th>
                                <?php endif; ?>
                                <td>
                                  <?php $__currentLoopData = $dueno->vehiculos->where('activo',true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($vehiculo->marca->description); ?> <?php echo e($vehiculo->modelo); ?>

                                    <em><a class="btn  btn-sm" href="<?php echo e(route('vehiculos.show', $vehiculo->id)); ?>" >
                                      (<?php echo e($vehiculo->codigo); ?>)
                                    </a></em> <br>
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