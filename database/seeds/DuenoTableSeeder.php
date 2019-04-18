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
        factory(App\Dueno::class, 30)->create();
    }
}
