<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddDefaultUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $idJoao = DB::table('users')->insertGetId(
            array(
                'name' => 'João Silva',
                'username' => 'joaosilva',
                'email' => 'joaosilva@domain.com',
                'password' => bcrypt('123456')
            )
        );
        $idMaria = DB::table('users')->insertGetId(
            array(
                'name' => 'Maria Sousa',
                'username' => 'mariasousa',
                'email' => 'mariasousa@domain.com',
                'password' => bcrypt('123456')
            )
        );
        $idFelipe = DB::table('users')->insertGetId(
            array(
                'name' => 'Felipe Santos',
                'username' => 'felipesantos',
                'email' => 'felipesantos@domain.com',
                'password' => bcrypt('123456')
            )
        );

        $idPergunta1 = DB::table('perguntas')->insertGetId(
            array(
                'pergunta_conteudo' => 'Qual sua cidade?',
                'remetente_id' => $idFelipe,
                'destinatario_id' => $idJoao
            )
        );

        $idResposta1 = DB::table('respostas')->insertGetId(
            array(
                'resposta_conteudo' => 'Fortaleza',
                'pergunta_id' => $idPergunta1
            )
        );

        DB::table('likes')->insert(
            array(
                'resposta_id' => $idResposta1,
                'usuario_like_id' => $idMaria
            )
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('username', 'joaosilva')->delete();
        DB::table('users')->where('username', 'mariasousa')->delete();
        DB::table('users')->where('username', 'felipesantos')->delete();
            
    }
}
