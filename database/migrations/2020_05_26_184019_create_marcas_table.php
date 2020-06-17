<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('marcas')) return;
        Schema::create('marcas', function (Blueprint $table) {
            $table->increments('Cv_Marca');
            $table->string('Nombre');
            $table->string('País');
            $table->string('DescripcionCorta', 200)->nullable();
            $table->string('DescripcionLarga', 500)->nullable();

            $table->integer('FK_Logo')->unsigned();

            $table->foreign('FK_Logo')->references('Cv_Imagen')->on('imagenes')
                ->onUpdate('cascade');
                
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcas');
    }
}
