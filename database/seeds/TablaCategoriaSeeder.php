<?php

use Illuminate\Database\Seeder;

class TablaCategoriaSeeder extends Seeder
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
    		DB::table('Categoria')->insert([
            'nombre' => str_random(10),
            'descripcion' => str_random(10),
        	]);
    	}
    }
}
