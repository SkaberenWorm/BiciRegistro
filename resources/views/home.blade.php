@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h4 class="mb-0">Corregir</h4>
                </div>

                <div class="card-body">
                    <h5>Eliminar de la lista una vez corregidos</h5>
                    <strike>
                    1. Fecha y hora (Esta dos horas adelantada) <br>
                    </strike>
                    2. Estilo (Menú, tablas, botones, paneles, etc) <br>
                    3. Deshabilitar en vez de eliminar (En el caso del usuario, a este se le agregara el rol de Bloqueado / any-access)<br>
                    <strike>
                    4. Optimizar imagen al subir al sistema (Afecta en la carga de la página) <a href="https://artisansweb.net/resize-image-laravel-using-intervention-image-library/"> PASOS</a> <br>
                    </strike>
                    5. Ordenar el listado de permisos al editar o crear un rol<br>
                    6. Agregar vista de errores (403, 404, 500, etc) <br>
                    <strike>
                    7. Validar la extención de las imagenes <br>
                    </strike>
                    8. Aplicar formato y validar el Run (11111111-1)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
