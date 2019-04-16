<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();
        User::create([
            'name'      => 'Ismael',
            'email'     => 'ismael.c.26a@gmail.com',
            'password'  => '$2y$10$bIckWkOCH2LimfpfCr/W0OqzEORozHhb9MbIsdNQV6I/vMJTuvjNK',
        ]);
        Role::create ([
            'name'      => 'Admin',
            'slug'      => 'admin',
            'special'   => 'all-access',
        ]);
    }
}
