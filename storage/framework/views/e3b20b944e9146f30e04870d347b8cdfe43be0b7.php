<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-10">
            <div class="card">
                <div class="card-header py-0">

                  <div class="row ">
                      <?php echo e(Form::open(['route' => 'registro.findDueno','class' => 'col-sm-6 col-md-6 mt-2'])); ?>

                      <div class="mb-3 mt-2">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">RUN</span>
                          </div>
                          <input type="text" id="buscarDueno" class="form-control mr-1" name="run" data-toggle="tooltip" data-placement="bottom" title="Ingrese run del ciclista" required  autofocus>

                          <?php echo e(Form::submit('Buscar', ['class' => 'btn btn-secondary', 'id'=>'btnBuscarDueno'])); ?>

                        </div>
                      </div>
                      <?php echo e(Form::close()); ?>

                      <?php if(isset($dueno)): ?>
                      <?php if($dueno->vehiculos->where('activo',true)->count() <= 1): ?>
                      <div class="col-md-3 col-sm-2 col-lg-4">

                      </div>

                        <?php echo e(Form::open(['route' => 'registro.crearCodigoTercero','id' => 'formCreateCode'])); ?>

                        <input type="hidden" name="vehiculoId" class="vehiculoId" value="<?php echo e($dueno->vehiculos[0]->id); ?>">
                        <div class="col-sm-4 col-md-3 mt-2 col-lg-2 px-0">
                          <div class="input-group mx-auto">
                            <button style="z-index:1"type="button" onclick="generarCodigoTercero(<?php echo e($dueno->vehiculos[0]->id); ?>)" class="btn btn-success" id="generarCodigo" name="generarCodigo" data-toggle="modal" data-target="#generarCodigoModal"><b>Generar código</b></button>
                          </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                      <?php else: ?>
                      <div class="text-right mt-3 px-3 pt-2 col-sm-6 col-md-6">
                      <h5 class="mb-0 pb-0">  <label class="text-secondary"> Código de retiro: <b class="codigoTercero text-danger"> </b></label></h5>
                      </div>

                      <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>


                  <?php if(isset($dueno)): ?>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="card m-3">
                          <div class="card-body">
                            <img src="<?php echo e(Storage::url($dueno->image)); ?>" class="img-fluid rounded mx-auto d-block mb-3" style="max-height:200px;">
                            <table class="table responsive-md table-sm mb-0 pb-0">
                              <tbody>
                                <tr>
                                  <th scope="row" style="width:30%;">Run</th>
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
                                  <td>+569 <?php echo e($dueno->celular); ?></td>
                                </tr>

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <?php if($dueno->vehiculos->where('activo',true)->count()>1): ?>
                      <div class="col-sm-6 my-3">
                        <?php echo e(Form::open(['route' => 'registro.crearCodigoTercero','id' => 'formCreateCode'])); ?>

                        <input type="hidden" class="vehiculoId" name="vehiculoId" value="">
                        <?php $__currentLoopData = $dueno->vehiculos->where('activo',true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id="accordion">
                          <div class="card mt-1 mr-3">
                            <div class="card-header py-0" id="heading<?php echo e($vehiculo->id); ?>">
                              <div class="row justify-content-center" data-toggle="collapse" data-target="#collapseOne<?php echo e($vehiculo->id); ?>" aria-expanded="true" aria-controls="collapseOne<?php echo e($vehiculo->id); ?>">
                                <div class="col-sm-3 mt-1 px-0">
                                  <img src="<?php echo e(Storage::url($vehiculo->image)); ?>" class="img-fluid rounded" style="max-height:50px;" alt="">
                                </div>
                                <h5 class="mb-0 col-sm-6  px-0">
                                  <a class="btn btn-link text-primary" style="text-decoration:none" data-toggle="collapse" data-target="#collapseOne<?php echo e($vehiculo->id); ?>" aria-expanded="true" aria-controls="collapseOne<?php echo e($vehiculo->id); ?>">
                                    <b><?php echo e($vehiculo->marca->description); ?> <?php echo e($vehiculo->modelo); ?></b><br>
                                    <?php echo e($vehiculo->codigo); ?>

                                  </a>
                                </h5>
                                  <div class="col-sm-3  px-0">
                                    <div class="input-group mt-3">
                                      <button type="button" class="btn btn-success btn-sm" onclick="generarCodigoTercero(<?php echo e($vehiculo->id); ?>)" id="generarCodigo" name="generarCodigo" data-toggle="modal" data-target="#generarCodigoModal"><b>Generar código</b></button>
                                    </div>
                                  </div>
                                </div>


                              </div>

                            </div>

                            <div id="collapseOne<?php echo e($vehiculo->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($vehiculo->id); ?>" data-parent="#accordion">
                              <div class="row card-body">
                                <div class="col-sm-5">
                                  <img src="<?php echo e(Storage::url($vehiculo->image)); ?>" class="img-fluid rounded mx-auto d-block mb-3" style="max-height:200px;" alt="">

                                </div>
                                <div class="col-sm-7">
                                  <table class="table responsive-md table-sm mb-4">
                                    <tbody>
                                      <tr>
                                        <th scope="row" style="width:30%;">Código</th>
                                        <td><?php echo e($vehiculo->codigo); ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Marca</th>
                                        <td><?php echo e($vehiculo->marca->description); ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Modelo</th>
                                        <td><?php echo e($vehiculo->modelo); ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Color</th>
                                        <td>
                                          <?php echo e($vehiculo->color); ?>

                                        </td>
                                      </tr>



                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e(Form::close()); ?>

                        </div>
                      </div>
                      <?php else: ?>

                      <div class="col-sm-6">
                        <div class="card m-3 pb-4">
                          <div class="card-body">
                            <img src="<?php echo e(Storage::url($dueno->vehiculos[0]->image)); ?>" class="img-fluid rounded mx-auto d-block mb-3" style="max-height:200px;">
                            <table class="table responsive-md table-sm mb-0 pb-0">
                              <tbody>
                                <tr>
                                  <th scope="row" style="width:35%;">Código</th>
                                  <td><?php echo e($dueno->vehiculos[0]->codigo); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Marca</th>
                                  <td><?php echo e($dueno->vehiculos[0]->marca->description); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Modelo</th>
                                  <td><?php echo e($dueno->vehiculos[0]->modelo); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Color</th>
                                  <td><?php echo e($dueno->vehiculos[0]->color); ?>

                                  </td>
                                </tr>
                                <tr>
                                  <th>Código de retiro </th>
                                  <td><b class="codigoTercero text-danger"> </b> </td>
                                </tr>

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <?php endif; ?>

                  <?php else: ?>

                    <div class="card-body">
                      <div class="row justify-content-center">
                        <?php if(isset($registrarDueno)): ?>
                        <div class="row justify-content-center col-md-10">
                          <h3 class="text-danger">Este RUN no esta registrado en el sistema</h3>
                        </div>
                        <div class="row justify-content-center col-md-10">
                          <?php if (\Shinobi::can('vehiculos.create')): ?>
                          <a class="btn btn-primary" href="<?php echo e(route('vehiculos.create')); ?>" >Registrar</a>
                          <?php endif; ?>
                        </div>
                        <?php else: ?>
                        <h3 class="text-secondary">Ingrese RUN del ciclista</h3>
                        <?php endif; ?>

                      </div>
                    </div>
                  <?php endif; ?>

                </div>


            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="generarCodigoModal" tabindex="-1" role="dialog" aria-labelledby="generarCodigoModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#00c851;">
            <h5 class="modal-title text-white"><b>Código generado</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Se ha generado el código correctamente! <br>
            El código <b class="codigoTercero">  </b> solo será válido hasta las 23:59 <br><br>
            ¿Desea envíar un e-mail a la cuenta
            <?php if(isset($dueno)): ?>
            <em><b><?php echo e($dueno->correo); ?></b></em>,
            <?php endif; ?>
             con el código de retiro <b class="codigoTercero">  </b>?
          </div>
          <div class="modal-footer">
            <input type="hidden" id="vehiculo_id" name="vehiculo_id" value="">
            <input type="hidden" id="codigo_tercero" name="codigo_tercero" value="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Enviar e-mail</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal -->
    <script src="<?php echo e(asset('js/jquery-ui.js')); ?>" defer></script>
    <script defer type="text/javascript">
    $(document).ready(function() {

    $( "#buscarDueno" ).autocomplete({
        source: "<?php echo e(url('autocompleteRunDueno')); ?>",
        minLength: 3
      });

    generarCodigoTercero = function(vehiculo_id){
      $('.vehiculoId').val(vehiculo_id);
      $.ajax({
         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
         type: "POST",
         url: "<?php echo e(route('registro.crearCodigoTercero')); ?>",
         data: {
           "vehiculoId": $('.vehiculoId').val(),
         },
         success: function(data)
         {
           $('.codigoTercero').html(data);
           $('#codigo_tercero').val(data);
           $('#vehiculo_id').val(vehiculo_id);
         }
     });
    };

});

    </script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>