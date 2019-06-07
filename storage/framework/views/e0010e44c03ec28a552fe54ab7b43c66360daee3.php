<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header pb-1">

                  <div class="row ">
                      <?php echo e(Form::open(['route' => 'registro.find','class' => 'col-md-6'])); ?>

                      <div class="mb-3 mt-2">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Código bicicleta</span>
                          </div>
                          <?php if(isset($vehiculo)): ?>
                            <input type="text" id="buscarVehiculo" class="form-control mr-1" autocomplete="off"  name="codigo" data-toggle="tooltip" data-placement="bottom" title="Ingrese código de la bicicleta" required >
                            <?php echo e(Form::submit('Buscar', ['class' => 'btn btn-secondary', 'id'=>'btnBuscarVehiculo'])); ?>

                          <?php else: ?>
                            <input type="text" id="buscarVehiculo" class="form-control mr-1" autocomplete="off"  name="codigo" data-toggle="tooltip" data-placement="bottom" title="Ingrese código de la bicicleta" required  autofocus>
                            <?php echo e(Form::submit('Buscar', ['class' => 'btn btn-secondary', 'id'=>'btnBuscarVehiculo'])); ?>

                          <?php endif; ?>

                        </div>
                      </div>
                      <?php echo e(Form::close()); ?>


                      <?php if(isset($vehiculo)): ?>
                      <?php echo e(Form::open(['id'=>'formValidate','onkeypress'=>'return anular(event)' ,'class' => 'col-md-6'])); ?>

                      <div class="mb-3 mt-2" >
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Código tercero</span>
                          </div>
                          <input type="hidden" name="vehiculo_id" value="<?php echo e($vehiculo->id); ?>">
                          <input type="text" min="3" max="4" autocomplete="off" class="form-control mr-1" name="codigo" data-toggle="tooltip" data-placement="bottom" title="Validar código para retiro por terceros" required  autofocus >
                          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#validarModal" onclick="validarCodigo()" name="button">Validar</button>
                        </div>
                      </div>
                      <?php echo e(Form::close()); ?>

                      <?php endif; ?>
                    </div>
                  </div>


                  <?php if(isset($vehiculo)): ?>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item pt-0 pb-2">
                        <div class="row justify-content-center pt-3 pl-2">
                          <?php if($retiroPorTercero): ?>
                          <div class="col-md-10 mb-0" id="alertaClaveTercero">
                            <div class="alert alert-info py-2" role="alert">
                            <b>Esta bicicleta puede ser retirada por un tercero, verifique el código para retiro por terceros</b>
                              <button type="button" class="close" id="bntAlertaClaveTercero">
                                <span aria-hidden="true" class="text-primary">×</span>
                              </button>
                            </div>
                          </div>
                          <?php endif; ?>
                          <div class="col-md-8">
                            <h4 class="text-danger pl-2">Acción: <?php echo e($accion); ?> </h4>
                            <h4 class="text-danger pl-2">
                              <div id="hora">

                              </div>

                          </div>
                          <div class="col-md-4 pt-2">
                            <?php echo e(Form::open(['route' => 'registro.store'])); ?>

                              <input type="hidden" name="vehiculo_id" value="<?php echo e($vehiculo->id); ?>">
                              <?php echo e(Form::submit('REGISTRAR', ['class' => 'btn btn-success'])); ?>

                              <button type="button" class="btn btn-outline-danger  ml-2" onclick="rechazadoEmail('<?php echo e($vehiculo->id); ?>','<?php echo e($vehiculo->dueno->correo); ?>')" data-toggle="modal" data-target="#rechazarModal" title="Rechazar si no es el dueño">RECHAZAR</button>
                            <?php echo e(Form::close()); ?>

                          </div>
                        </div>
                      </li>


                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6 pb-2">
                          <div class="card">
                            <div class="card-body mb-2">
                              <table class="table responsive-md table-sm mb-4">
                                <img src="<?php echo e(Storage::url($vehiculo->image)); ?>" class="img-fluid rounded mx-auto d-block mb-3" style="max-height:200px;" alt="">
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
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <img src="<?php echo e(Storage::url($vehiculo->dueno->image)); ?>" class="img-fluid rounded mx-auto d-block mb-3" style="max-height:200px;">
                              <table class="table responsive-md table-sm mb-0 pb-0">
                                <tbody>
                                  <tr>
                                    <th scope="row" style="width:30%;">Run</th>
                                    <td><?php echo e($vehiculo->dueno->rut); ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Nombre</th>
                                    <td><?php echo e($vehiculo->dueno->nombre); ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Área</th>
                                    <td><?php echo e($vehiculo->dueno->tipoDueno->description); ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Correo</th>
                                    <td><?php echo e($vehiculo->dueno->correo); ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Celular</th>
                                    <td>(+56) <?php echo e($vehiculo->dueno->celular); ?></td>
                                  </tr>

                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    </ul>
                  <?php else: ?>

                    <div class="card-body">
                      <div class="row justify-content-center">
                        <?php if(isset($registrarNuevaBicicleta)): ?>
                        <div class="row justify-content-center col-md-10">
                          <h3 class="text-danger">Esta bicicleta no esta registrada en el sistema</h3>
                        </div>
                        <div class="row justify-content-center col-md-10">
                          <?php if (\Shinobi::can('vehiculos.create')): ?>
                          <a class="btn btn-primary" href="<?php echo e(route('vehiculos.create')); ?>" >Registrar bicicleta</a>
                          <?php endif; ?>
                        </div>
                        <?php else: ?>
                        <h3 class="text-secondary">Ingrese el código de la bicicleta</h3>
                        <?php endif; ?>

                      </div>
                    </div>
                  <?php endif; ?>

                </div>


            </div>
        </div>
    </div>

</div>

<!-- Modal Rechazar registro-->
<div class="modal fade" id="rechazarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>Se ha rechazado la salida!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label> Se está rechazando la salida de está bicicleta</label><br>
        <label> ¿Desea enviar un aviso al correo <b class="correoDueno"></b>? </label><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" disabled>Envíar correo</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal Rechazar registro-->

<!-- Modal Validacion-->
<div class="modal fade" id="validarModal" tabindex="-1" role="dialog" aria-labelledby="validarModalLabel" aria-hidden="true">
  <div id="modal-dialog" class="modal-dialog" role="document">
    <div class="modal-content">
      <div  class="modal-header">
        <h5 class="modal-title"><b>Resultado de la validación<label id="resultadoLabel"></label> </b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div id="permitted" class="my-5" style="display:none">

          <div class="o-circle mx-auto o-circle__sign--success ">
            <div class="o-circle__sign"></div>
          </div>
        </div>
        <div id="denied" class="my-5" style="display:none">

          <div class="o-circle mx-auto o-circle__sign--failure">
            <div class="o-circle__sign"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- /Modal Validacions-->
<script type="text/javascript">
function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla != 13);
     }
$(document).ready(function() {

  rechazadoEmail = function(vehiculo_id, correoDueno){
    $('.correoDueno').html(correoDueno);
  }

    $("#hora").load("<?php echo e(route('hora')); ?>");
    var refreshId = setInterval(function() {
        $("#hora").load("<?php echo e(route('hora')); ?>")
    }, 1000);
    $('#bntAlertaClaveTercero').click(function(){
      $('#alertaClaveTercero').hide();
    });
    // Función  para validar el código de retiro por terceros, sin recargar la página
    validarCodigo = function(){
      $(".check-icon").hide();
      $.ajax({
         type: "POST",
         url: "<?php echo e(route('registro.validarTercero')); ?>",
         data: $("#formValidate").serialize(),
         success: function(data)
         {
           // El código para retiro por terceros es válido
           if(data == 'permitted'){
             $('#resultadoLabel').text(': Correcto!!')
             $('#denied').hide();
              $('#permitted').show();
              $('#modal-dialog').addClass('modal-success');
              $('#modal-dialog').removeClass('modal-danger');

           }else{
             $('#resultadoLabel').text(': Incorrecto!!')
             $('#permitted').hide();
             $("#denied").show();
             $('#modal-dialog').addClass('modal-danger');
             $('#modal-dialog').removeClass('modal-success');
           }

         }
     });
    };
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>