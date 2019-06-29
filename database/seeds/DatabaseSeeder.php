<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PermissionsTable::class);
         $this->call(MarcaTableSeeder::class);
         $this->call(TipoDuenoTableSeeder::class);
         //$this->call(DuenoTableSeeder::class);
         //$this->call(VehiculosTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         //$this->call(RegistroTableSeeder::class);

    }
}
