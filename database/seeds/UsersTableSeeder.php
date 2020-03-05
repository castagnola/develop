<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'documento' => '1141517048',
            'nombres' => 'Empleado1',
            'telefono' => '3214445455',
            'direccion' => 'av 19',
        ]);
    }
}
