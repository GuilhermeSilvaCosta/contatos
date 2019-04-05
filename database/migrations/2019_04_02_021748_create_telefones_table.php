<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contato_id');
            $table->bigInteger('tipo_id');
            $table->string('telefone');
            $table->timestamps();
            $table->foreign('contato_id')
                ->references('id')->on('contatos')
                ->onDelete('cascade');
            $table->foreign('tipo_id')
                ->references('id')->on('tipo_telefones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefones');
    }
}
