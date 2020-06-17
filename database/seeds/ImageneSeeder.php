<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ImageneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('imagenes')->insert([
            ["Foto" => "foto1.png", "created_at" => Carbon::now()],
            ["Foto" => "foto2.png", "created_at" => Carbon::now()],
        ]);
    }
}
