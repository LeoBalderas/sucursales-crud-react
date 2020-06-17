<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('marcas')->insert([
            ["Nombre" => "Aston Martin", 
            "País" => "Reino Unido", 
            "DescripcionCorta" => "Aston Martin es un fabricante británico de automóviles de lujo y alto rendimiento, perteneciente a un consorcio liderado por David Richards de Prodrive desde marzo de 2007.",
            "FK_Logo" => 1, 
            "created_at" => Carbon::now()],
            ["Nombre" => "Bugatti", 
            "País" => "Francia", 
            "DescripcionCorta" => "Bugatti es una marca de automóviles francesa de gran lujo y competición fundada en el año 1909 por Ettore Bugatti en Molsheim, localidad actualmente en Francia.", 
            "FK_Logo" => 2, 
            "created_at" => Carbon::now()],
        ]);
    }
}
