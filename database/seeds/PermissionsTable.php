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
            'name'          => 'Eliminar usuarios',
            'slug'          => 'users.destroy',
            'description'   => 'Elimina cualquier usuario',
        ]);
        Permission::create ([
            'name'          => 'Crear usuario',
            'slug'          => 'users.create',
            'description'   => 'Crear un usuario',
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
            'name'          => 'Elvehiculosiminar vehiculos',
            'slug'          => 'vehiculos.destroy',
            'description'   => 'Elimina cualquier rol',
        ]);
        Permission::create ([
            'name'          => 'Crear vehiculo',
            'slug'          => 'vehiculos.create',
            'description'   => 'Crear un vehiculo',
        ]);
    }
}
