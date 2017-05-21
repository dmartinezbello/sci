<?php

use Illuminate\Database\Seeder;

class TablaEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i=0; $i<10; $i++)
    	{
    		DB::table('Empleado')->insert([
            'usuario' => str_random(3),
            'password' => bcrypt('secret'),
            'nombre' => str_random(10),
            'apellido' => str_random(10)
        	]);
    	}
    }
}
