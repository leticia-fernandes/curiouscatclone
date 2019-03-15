<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('resposta_conteudo');
            $table->unsignedInteger('pergunta_id');
            $table->boolean('ativo')->default(true);
            $table->timestamps();

            $table->foreign('pergunta_id')->references('id')->on('perguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respostas_tables');
    }
}
