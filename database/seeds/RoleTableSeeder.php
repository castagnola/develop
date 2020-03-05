<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert(
           [ 
               'id'=>1,
                'nombre_cargo' => 'Tecnico',
                    
        ]);
        
        DB::table('role')->insert(
            [
                'id'=>2,
                'nombre_cargo' => 'Gerente',
            
                ]);
    }
}
