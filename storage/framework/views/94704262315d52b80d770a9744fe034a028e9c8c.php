<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    <?php if (\Shinobi::can('users.create')): ?>
                    <a class="btn btn-primary float-right btn-md" href="<?php echo e(route('users.create')); ?>" >Crear</a>
                    <?php endif; ?>

                    <h3 style="margin-top: 5px; margin-bottom: 0px">Usuarios</h3>
                </div>

                <div class="card-body">

                    <table id="tablasAdministracion" class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                            <th >N°</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <?php if (\Shinobi::can('users.show')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            <?php if (\Shinobi::can('users.edit')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            <?php if (\Shinobi::can('users.destroy')): ?>
                            <th style="width:10px"></th>
                            <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php ($cantidadRoles = 0); ?>

                                <?php if($user->roles->count()==0): ?>
                                    <tr style="color:red">
                                <?php else: ?>
                                    <tr>
                                <?php endif; ?>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($role->user_id === $user->id): ?>
                                        <?php echo e($role->role_name); ?> <br>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <?php if (\Shinobi::can('users.show')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="<?php echo e(route('users.show', $user->id)); ?>" >Ver</a>
                                </td>
                                <?php endif; ?>
                                <?php if (\Shinobi::can('users.edit')): ?>
                                <td style="padding: .3rem; vertical-align: inherit;">
                                    <a class="btn btn-light btn-sm" href="<?php echo e(route('users.edit', $user->id)); ?>" >Editar</a>
                                </td>
                                <?php endif; ?>
                                <?php if (\Shinobi::can('users.destroy')): ?>
                                <?php if($user->activo): ?>
                                  <td style="padding: .3rem; vertical-align: inherit;">
                                    <button type="button" name="button" onclick="btnDeshabiliar('<?php echo e($user->id); ?>','<?php echo e($user->rut); ?>','<?php echo e($user->name); ?>','<?php echo e($user->email); ?>','<?php echo e(Storage::url($user->image)); ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deshabilitarUserModal">Deshabilitar</button>
                                  </td>
                                  <?php else: ?>
                                  <td style="padding: .3rem; vertical-align: inherit;">
                                    <button type="button" name="button" onclick="btnHabiliar('<?php echo e($user->id); ?>','<?php echo e($user->rut); ?>','<?php echo e($user->name); ?>','<?php echo e($user->email); ?>','<?php echo e(Storage::url($user->image)); ?>')" class="btn btn-success btn-sm" data-toggle="modal" data-target="#habilitarUserModal">Habilitar</button>
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
    <!-- Modal Disable-->
    <div class="modal fade" id="deshabilitarUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <?php echo e(Form::open([ 'method'  => 'post', 'route' => [ 'users.disable']])); ?>


          <div class="modal-header">
            <h5 class="modal-title"><b>Deshabilitar usuario</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Está seguro(a) que desea deshabilitar este usuario?
            <table class=" mt-3">
              <tr>
                <td><img src="" id="imagenUserModalDisable" class="img-fluid rounded " style="max-height: 100px" alt=""></td>
                <td class="px-3 mx-auto">
                  <h5 class="" id="codigoUserModalDisable"></h5>
                  <label id="marcaUserModalDisable"></label>
                  <label id="modeloUserModalDisable"></label>
                </td>
                <td></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="user_idModalDisable" name="user_idModalDisable">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <?php echo e(Form::submit('Deshabilitar', ['class' => 'btn btn-danger'])); ?>

          </div>
      <?php echo e(Form::close()); ?>

        </div>
      </div>
    </div>
    <!-- /Modal Disable-->
    <!-- Modal Enable-->
    <div class="modal fade" id="habilitarUserModal" tabindex="-1" role="dialog" aria-labelledby="habilitarUserModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo e(Form::open([ 'method'  => 'post', 'route' => [ 'users.enable']])); ?>

          <div class="modal-header" style="background-color: #00c851;">
            <h5 class="modal-title"><b class="text-white">Habilitar usuario</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Está seguro(a) que desea habilitar este usuario?
            <table class=" mt-3">
              <tr>
                <td><img src="" id="imagenUserModalEnable" class="img-fluid rounded " style="max-height: 100px" alt=""></td>
                <td class="px-3 mx-auto">
                  <h5 class="" id="codigoUserModalEnable"></h5>
                  <label id="marcaUserModalEnable"></label>
                  <label id="modeloUserModalEnable"></label>
                </td>
                <td></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="user_idModalEnable" name="user_idModalEnable">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <?php echo e(Form::submit('Habilitar', ['class' => 'btn btn-success'])); ?>

          </div>
      <?php echo e(Form::close()); ?>

        </div>
      </div>
    </div>
    <!-- /Modal Enable-->
</div>
<script type="text/javascript" class="init">
$(document).ready(function() {
  $('#tablasAdministracion').DataTable({
    "columnDefs": [{
        "orderable": false,
        "targets": [4,5,-1,-2]
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

  btnDeshabiliar=function(user_id,rut, name, email,imagen){
    $('#user_idModalDisable').val(user_id);
    $('#marcaUserModalDisable').text(rut);
    $('#modeloUserModalDisable').text(name);
    $('#codigoUserModalDisable').text(email);
    $('#imagenUserModalDisable').attr("src",imagen);
  };
  btnHabiliar=function(user_id,rut, name, email,imagen){
    $('#user_idModalEnable').val(user_id);
    $('#marcaUserModalEnable').text(rut);
    $('#modeloUserModalEnable').text(name);
    $('#codigoUserModalEnable').text(email);
    $('#imagenUserModalEnable').attr("src",imagen);
  };
} );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appTables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>