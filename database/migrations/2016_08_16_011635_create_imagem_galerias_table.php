<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagemGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem_galerias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('galeria_id')->unsigned();
            $table->string('nome');
            $table->string('legenda')->nullable();
            $table->tinyInteger('capa');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('galeria_id')->references('id')->on('galerias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('imagem_galerias', function (Blueprint $table) {
            $table->dropForeign('galeria_id');
        });
    }
}
