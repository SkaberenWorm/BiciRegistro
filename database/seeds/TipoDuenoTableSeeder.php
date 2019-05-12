<?php

use Illuminate\Database\Seeder;
use BiciRegistro\TipoDueno;

class TipoDuenoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDueno::create ([
            'description'   => 'Administrativo',
        ]);
        TipoDueno::create ([
            'description'   => 'Profesor',
        ]);
        TipoDueno::create ([
            'description'   => 'Visitante',
        ]);
        TipoDueno::create ([
            'description'   => 'Alumno',
        ]);
        TipoDueno::create ([
            'description'   => 'Guardia',
        ]);
        TipoDueno::create ([
            'description'   => 'Otro',
        ]);
    }
}
