<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
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
        factory(BiciRegistro\User::class, 3)->create();
        User::create([
            'name'      => 'Ismael Cuevas',
            'email'     => 'ismael.c.26a@gmail.com',
            'password'  => '$2y$10$bIckWkOCH2LimfpfCr/W0OqzEORozHhb9MbIsdNQV6I/vMJTuvjNK',
        ]);
        User::create([
            'name'      => 'Richard Atton',
            'email'     => 'r.atton@alumnos.duoc.cl',
            'password'  => '$2y$10$xzeqj9IG.7HcePrSzVUuBOhJIP1ETEFpVn3fBS.fCI9UDnKbswuj2',
        ]);
        Role::create ([
            'name'      => 'Admin',
            'slug'      => 'admin',
            'special'   => 'all-access',
        ]);
        Role::create ([
            'name'      => 'Guardia',
            'slug'      => 'guardia',
        ]);
    }
}
