<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use BiciRegistro\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create ([
            'name'      => 'Admin',
            'slug'      => 'admin',
            'special'   => 'all-access',
        ]);
        $role = Role::create ([
            'name'        => 'Guardia',
            'slug'        => 'guardia',
        ]);
        $role->permissions()->sync([6,7,8,14,15,16,18,19,20]);

        $role = Role::create ([
            'name'        => 'Carga masiva',
            'slug'          => 'carga_masiva',
            'description' => 'Rol encargado solo de registrar las bicicletas y dueños al sistema',
        ]);
        $role->permissions()->sync(18);

        Role::create ([
            'name'      => 'Acceso denegado',
            'slug'      => 'deny_access',
            'special'   => 'no-access',
            'description' => 'Sin acceso a los módulos',
        ]);

        $user= User::create([
            'name'      => 'Administrador',
            'email'     => 'admin@duoc.cl',
            'password'  => '$2y$10$n.ILjgJlox.bNiyjN1xuBubOAumZvtIZjRUfCiRj74ET.1RosWYu6',
        ]);
        $user->roles()->sync(1);


        /*for ($i = 0; $i < 10; $i++) {
           $user = factory(BiciRegistro\User::class)->create();
           $user->roles()->sync(2);
         }

         for ($i = 0; $i < 10; $i++) {
          $user = factory(BiciRegistro\User::class)->create();
          $user->roles()->sync(3);
        }*/

    }
}
