<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // USERS
        Permission::create ([
            'name'          => 'Listar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista todos los usuarios',
            'grupo'         => 'usuarios',
        ]);
        Permission::create ([
            'name'          => 'Ver usuario',
            'slug'          => 'users.show',
            'description'   => 'Ver detalle de un usuario',
            'grupo'         => 'usuarios',
        ]);
        Permission::create ([
            'name'          => 'Editar usuario',
            'slug'          => 'users.edit',
            'description'   => 'Editar un usuario',
            'grupo'         => 'usuarios',
        ]);
        Permission::create ([
            'name'          => 'Deshabilitar / Habilitar usuarios',
            'slug'          => 'users.status',
            'description'   => 'Deshabilita o habilita cualquier usuario',
            'grupo'         => 'usuarios',
        ]);
        Permission::create ([
            'name'          => 'Crear usuario',
            'slug'          => 'users.create',
            'description'   => 'Crear un usuario',
            'grupo'         => 'usuarios',
        ]);

        // DUEÑOS
        Permission::create ([
            'name'          => 'Listar dueños',
            'slug'          => 'duenos.index',
            'description'   => 'Lista todos los dueños',
            'grupo'         => 'duenos',
        ]);
        Permission::create ([
            'name'          => 'Ver dueño',
            'slug'          => 'duenos.show',
            'description'   => 'Ver detalle de un dueño',
            'grupo'         => 'duenos',
        ]);
        Permission::create ([
            'name'          => 'Editar dueño',
            'slug'          => 'duenos.edit',
            'description'   => 'Editar un dueño',
            'grupo'         => 'duenos',
        ]);

        // ROLES
        Permission::create ([
            'name'          => 'Listar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista todos los roles',
            'grupo'         => 'roles',
        ]);
        Permission::create ([
            'name'          => 'Ver rol',
            'slug'          => 'roles.show',
            'description'   => 'Ver detalle de un rol',
            'grupo'         => 'roles',
        ]);
        Permission::create ([
            'name'          => 'Editar rol',
            'slug'          => 'roles.edit',
            'description'   => 'Editar un rol',
            'grupo'         => 'roles',
        ]);
        Permission::create ([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Elimina cualquier rol',
            'grupo'         => 'roles',
        ]);
        Permission::create ([
            'name'          => 'Crear rol',
            'slug'          => 'roles.create',
            'description'   => 'Crear un rol',
            'grupo'         => 'roles',
        ]);

        // Vehiculos
        Permission::create ([
            'name'          => 'Listar bicicletas',
            'slug'          => 'vehiculos.index',
            'description'   => 'Lista todas las bicicletas',
            'grupo'         => 'bicicletas',
        ]);
        Permission::create ([
            'name'          => 'Ver bicicleta',
            'slug'          => 'vehiculos.show',
            'description'   => 'Ver detalle de una bicicleta',
            'grupo'         => 'bicicletas',
        ]);
        Permission::create ([
            'name'          => 'Editar bicicleta',
            'slug'          => 'vehiculos.edit',
            'description'   => 'Editar una bicicleta',
            'grupo'         => 'bicicletas',
        ]);
        Permission::create ([
            'name'          => 'Deshabilitar / Habilita bicicleta',
            'slug'          => 'vehiculos.status',
            'description'   => 'Deshabilita o habilita cualquier bicicleta',
            'grupo'         => 'bicicletas',
        ]);
        Permission::create ([
            'name'          => 'Crear bicicleta y dueño',
            'slug'          => 'vehiculos.create',
            'description'   => 'Crear una bicicleta junto a su dueño',
            'grupo'         => 'bicicletas',
        ]);

        // Registros
        Permission::create ([
            'name'          => 'Registrar entradas y salidas',
            'slug'          => 'registros.index',
            'description'   => 'Puede ver la pantalla de búsqueda de bicicletas y registrar entradas/salidas de bicicletas',
            'grupo'         => 'otros',
        ]);
        Permission::create ([
            'name'          => 'Crear códigos para retiro por terceros',
            'slug'          => 'registros.tercero',
            'description'   => 'Puede crear y validar códigos de bicicletas para retiro por terceros',
            'grupo'         => 'otros',
        ]);
    }
}
