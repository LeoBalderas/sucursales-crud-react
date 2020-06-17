<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sucursales')->insert([
            ["Nombre" => "Audi Cancún",
            "Direccion" => "Quintana Roo", 
            "Telefono" => "9981057025",
            "created_at" => Carbon::now()],
            ["Nombre" => "Porche CDMX", 
            "Direccion" => "Santa Fe, Ciudad de México", 
            "Telefono" => "5502585047",
            "created_at" => Carbon::now()],
            ["Nombre" => "Ferrari GD MX", 
            "Direccion" => "Guadalajara, Jalisco", 
            "Telefono" => "7805286490",
            "created_at" => Carbon::now()],
        ]);

    }
}
