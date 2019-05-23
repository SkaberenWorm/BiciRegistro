<?php $__env->startSection('content'); ?>

<div class="container ">
    <div class="row justify-content-center">
      <div class="col-md-10">
          <div class="card">
            <div class="card-header">
                  <?php if (\Shinobi::can('vehiculos.create')): ?>
                  <a class="btn btn-primary float-right btn-md" href="<?php echo e(route('vehiculos.create')); ?>" >Crear</a>
                  <?php endif; ?>

                  <h3 style="margin-top: 5px; margin-bottom: 0px">Bicicletas</h3>
              </div>
              <div class="card-body">
                  <table id="tablasAdministracion" class="table table-hover table-responsive-sm" width="100%">
                      <thead>
                          <tr>

                          <th>N°</th>
                          <th style="width: 10px;">Imagen</th>
                          <th>Código</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Dueño</th>
                          <?php if (\Shinobi::can('vehiculos.show')): ?>
                          <th style="width:10px"></th>
                          <?php endif; ?>
                          <?php if (\Shinobi::can('vehiculos.edit')): ?>
                          <th style="width:10px"></th>
                          <?php endif; ?>
                          <?php if (\Shinobi::can('vehiculos.destroy')): ?>
                          <th style="width:10px"></th>
                          <?php endif; ?>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td><?php echo e($vehiculo->id); ?></td>
                              <td style="padding: 0.05rem 0.75rem 0.05rem 0.75rem; vertical-align: inherit;">
                                  <img src="<?php echo e(Storage::url($vehiculo->image)); ?>" class="img-fluid rounded " style="max-height: 35px" alt="">
                              </td>
                              <td> <?php echo e($vehiculo->codigo); ?></td>
                              <td> <?php echo e($vehiculo->marca->description); ?> </td>
                              <td> <?php echo e($vehiculo->modelo); ?></td>
                              <td> <?php echo e($vehiculo->dueno->nombre); ?> </td>
                              <?php if (\Shinobi::can('vehiculos.show')): ?>
                              <td style="padding: .3rem; vertical-align: inherit;">
                                  <a class="btn btn-light btn-sm" href="<?php echo e(route('vehiculos.show', $vehiculo->id)); ?>">Ver</a>
                              </td>
                              <?php endif; ?>
                              <?php if (\Shinobi::can('vehiculos.edit')): ?>
                              <td style="padding: .3rem; vertical-align: inherit;">
                                  <a class="btn btn-light btn-sm" href="<?php echo e(route('vehiculos.edit', $vehiculo->id)); ?>">Editar</a>
                              </td>
                              <?php endif; ?>
                              <?php if (\Shinobi::can('vehiculos.destroy')): ?>
                              <?php if($vehiculo->activo): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                  <button type="button" name="button" onclick="btnDeshabiliar('<?php echo e($vehiculo->id); ?>','<?php echo e($vehiculo->codigo); ?>','<?php echo e($vehiculo->marca->description); ?>','<?php echo e($vehiculo->modelo); ?>','<?php echo e(Storage::url($vehiculo->image)); ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deshabilitarVehiculoModal">Deshabilitar</button>
                                </td>
                                <?php else: ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                  <button type="button" name="button" onclick="btnHabiliar('<?php echo e($vehiculo->id); ?>','<?php echo e($vehiculo->codigo); ?>','<?php echo e($vehiculo->marca->description); ?>','<?php echo e($vehiculo->modelo); ?>','<?php echo e(Storage::url($vehiculo->image)); ?>')" class="btn btn-success btn-sm" data-toggle="modal" data-target="#habilitarVehiculoModal">Habilitar</button>
                                </td>
                              <?php endif; ?>
                              <?php endif; ?>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deshabilitarVehiculoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <?php echo e(Form::open([ 'method'  => 'post', 'route' => [ 'vehiculos.disable']])); ?>


          <div class="modal-header">
            <h5 class="modal-title"><b>Deshabilitar bicicleta</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Está seguro(a) que desea deshabilitar esta bicicleta?
            <table class=" mt-3">
              <tr>
                <td><img src="" id="imagenVehiculoModalDisable" class="img-fluid rounded " style="max-height: 100px" alt=""></td>
                <td class="px-3 mx-auto">
                  <h5 class="" id="codigoVehiculoModalDisable"></h5>
                  <label id="marcaVehiculoModalDisable"></label>
                  <label id="modeloVehiculoModalDisable"></label>
                </td>
                <td></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="vehiculo_idModalDisable" name="vehiculo_idModalDisable">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <?php echo e(Form::submit('Deshabilitar', ['class' => 'btn btn-danger'])); ?>

          </div>
      <?php echo e(Form::close()); ?>

        </div>
      </div>
    </div>
    <!-- /Modal -->
    <!-- Modal -->
    <div class="modal fade" id="habilitarVehiculoModal" tabindex="-1" role="dialog" aria-labelledby="habilitarVehiculoModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo e(Form::open([ 'method'  => 'post', 'route' => [ 'vehiculos.enable']])); ?>

          <div class="modal-header" style="background-color: #00c851;">
            <h5 class="modal-title"><b class="text-white">Habilitar bicicleta</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Está seguro(a) que desea habilitar esta bicicleta?
            <table class=" mt-3">
              <tr>
                <td><img src="" id="imagenVehiculoModalEnable" class="img-fluid rounded " style="max-height: 100px" alt=""></td>
                <td class="px-3 mx-auto">
                  <h5 class="" id="codigoVehiculoModalEnable"></h5>
                  <label id="marcaVehiculoModalEnable"></label>
                  <label id="modeloVehiculoModalEnable"></label>
                </td>
                <td></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="vehiculo_idModalEnable" name="vehiculo_idModalEnable">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <?php echo e(Form::submit('Habilitar', ['class' => 'btn btn-success'])); ?>

          </div>
      <?php echo e(Form::close()); ?>

        </div>
      </div>
    </div>
    <!-- /Modal -->
</div>
<script type="text/javascript" class="init">
$(document).ready(function() {
  $('#tablasAdministracion').DataTable({
    "columnDefs": [{
        "orderable": false,
        "targets": [1,6,7,-1,-2]
    }],
    //"scrollY": "500px",
    "scrollCollapse": true,
    "language": {
     "sLengthMenu": "Ver _MENU_ registros",
      "search": "Buscar",
      "zeroRecords": "No se encontraron registros",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoFiltered": " (filtrado de un total de _MAX_ resultados)",
      "paginate": {
        "first": "Primero",
        "last":"Últimolabel",
        "next":"Siguiente",
        "previous":"Anterior",
      }
  }
  });
  $('.dataTables_length').addClass('bs-select');

  btnDeshabiliar=function(vehiculoModal,codigo, marca, modelo,imagen){
    $('#vehiculo_idModalDisable').val(vehiculoModal);
    $('#marcaVehiculoModalDisable').text(marca);
    $('#modeloVehiculoModalDisable').text(modelo);
    $('#codigoVehiculoModalDisable').text(codigo);
    $('#imagenVehiculoModalDisable').attr("src",imagen);
  };
  btnHabiliar=function(vehiculoModal,codigo, marca, modelo,imagen){
    $('#vehiculo_idModalEnable').val(vehiculoModal);
    $('#marcaVehiculoModalEnable').text(marca);
    $('#modeloVehiculoModalEnable').text(modelo);
    $('#codigoVehiculoModalEnable').text(codigo);
    $('#imagenVehiculoModalEnable').attr("src",imagen);
  };

} );
</script>

<!--script type="text/javascript" class="init">

$(document).ready(function() {
  $('#example').DataTable({
    "serverSide": true,
    "ajax": "<?php echo e(url('api/vehiculos')); ?>",
    "columns": [
      {data:'id'},
      {data:'image'},
      {data:'codigo'},
      {data:'modelo'},
      {data:'modelo'},
      {data:'color'},
      {data:'dueno_id'},
    ]
  });
} );

</script-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appTables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>