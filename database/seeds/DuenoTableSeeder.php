<?php

use Illuminate\Database\Seeder;

class DuenoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BiciRegistro\Dueno::class, 200)->create();
    }
}
