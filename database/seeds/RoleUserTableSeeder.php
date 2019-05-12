<?php

use Illuminate\Database\Seeder;
use BiciRegistro\RoleUser;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleUser::create ([
            'role_id'          => 1,
            'user_id'          => 4,
        ]);
        RoleUser::create ([
            'role_id'          => 1,
            'user_id'          => 5,
        ]);
    }
}
