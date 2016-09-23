<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grupo_usuario_id')->unsigned();
            $table->integer('rota_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('grupo_usuario_id')->references('id')->on('grupo_usuarios');
            $table->foreign('rota_id')->references('id')->on('rotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissao');
    }
}
