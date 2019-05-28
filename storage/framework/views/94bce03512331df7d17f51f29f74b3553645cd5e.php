<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h4 class="mb-0">Corregir</h4>
                </div>

                <div class="card-body">
                    <strike>
                    1. Fecha y hora (Esta dos horas adelantada) <br>
                    </strike>
                    2. Estilo (Menú, tablas, botones, paneles, etc) <br>
                    <strike>
                    3. Deshabilitar en vez de eliminar<br>
                    </strike>
                    <strike>
                    4. Optimizar imagen al subir al sistema (Afecta en la carga de la página) <a href="https://artisansweb.net/resize-image-laravel-using-intervention-image-library/"> PASOS</a> <br>
                    </strike>
                    5. Ordenar el listado de permisos al editar o crear un rol<br>
                    6. Agregar vista de errores (403, 404, 500, etc) <br>
                    <strike>
                    7. Validar la extención de las imagenes <br>
                    </strike>
                    8. Aplicar formato y validar el Run (11111111-1) <br>
                    <strike>
                    9. Una vez terminada las vistas de registro de ingreso y salida, registrar permisos en la BD ->middleware('permission:registro.acción') <br>
                    </strike>
                    <strike>
                    10. Corregir autofocus (Reistro entrada y salida) <br>
                    </strike>
                    <strike>
                    11. Cambiar la forma del pop-ups <br>
                    </strike>
                    12. Si no tiene acceso, mostrar un mensaje en Home y no permitir que ingrese  <br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>