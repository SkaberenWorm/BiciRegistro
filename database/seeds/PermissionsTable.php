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
        ]);
        Permission::create ([
            'name'          => 'Ver usuario',
            'slug'          => 'users.show',
            'description'   => 'Ver detalle de un usuario',
        ]);
        Permission::create ([
            'name'          => 'Editar usuario',
            'slug'          => 'users.edit',
            'description'   => 'Editar un usuario',
        ]);
        Permission::create ([
            'name'          => 'Deshabilitar usuarios',
            'slug'          => 'users.destroy',
            'description'   => 'Deshabilita cualquier usuario',
        ]);
        Permission::create ([
            'name'          => 'Crear usuario',
            'slug'          => 'users.create',
            'description'   => 'Crear un usuario',
        ]);

        // DUEÑOS
        Permission::create ([
            'name'          => 'Listar dueños',
            'slug'          => 'duenos.index',
            'description'   => 'Lista todos los dueños',
        ]);
        Permission::create ([
            'name'          => 'Ver dueño',
            'slug'          => 'duenos.show',
            'description'   => 'Ver detalle de un dueño',
        ]);
        Permission::create ([
            'name'          => 'Editar dueño',
            'slug'          => 'duenos.edit',
            'description'   => 'Editar un dueño',
        ]);

        // ROLES
        Permission::create ([
            'name'          => 'Listar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista todos los roles',
        ]);
        Permission::create ([
            'name'          => 'Ver rol',
            'slug'          => 'roles.show',
            'description'   => 'Ver detalle de un rol',
        ]);
        Permission::create ([
            'name'          => 'Editar rol',
            'slug'          => 'roles.edit',
            'description'   => 'Editar un rol',
        ]);
        Permission::create ([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Elimina cualquier rol',
        ]);
        Permission::create ([
            'name'          => 'Crear rol',
            'slug'          => 'roles.create',
            'description'   => 'Crear un rol',
        ]);

        // Vehiculos
        Permission::create ([
            'name'          => 'Listar vehiculos',
            'slug'          => 'vehiculos.index',
            'description'   => 'Lista todos los vehiculos',
        ]);
        Permission::create ([
            'name'          => 'Ver vehiculo',
            'slug'          => 'vehiculos.show',
            'description'   => 'Ver detalle de un vehiculo',
        ]);
        Permission::create ([
            'name'          => 'Editar vehiculo',
            'slug'          => 'vehiculos.edit',
            'description'   => 'Editar un vehiculo',
        ]);
        Permission::create ([
            'name'          => 'Deshabilitar vehiculos',
            'slug'          => 'vehiculos.destroy',
            'description'   => 'Deshabilita cualquier vehiculo',
        ]);
        Permission::create ([
            'name'          => 'Crear vehiculo y dueño',
            'slug'          => 'vehiculos.create',
            'description'   => 'Crear un vehiculo junto a su dueño',
        ]);

        // Registros
        Permission::create ([
            'name'          => 'Registrar entradas y salidas',
            'slug'          => 'registros.index',
            'description'   => 'Puede ver la pantalla de búsqueda de bicicletas y registrar entradas/salidas de bicicletas',
        ]);
        Permission::create ([
            'name'          => 'Crear códigos para retiro por terceros',
            'slug'          => 'registros.tercero',
            'description'   => 'Puede crear y validar códigos de bicicletas para retiro por terceros',
        ]);
    }
}
