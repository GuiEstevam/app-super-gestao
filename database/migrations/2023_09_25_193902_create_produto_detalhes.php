<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            //colunas
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 8, 2);
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos'); //chave estrangeira (foreign key) para a tabela produtos
            $table->unique('produto_id'); //garante que a coluna produto_id seja única na tabela produto_detalhes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remover o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign(['unidade_id']); // Altere o nome da chave estrangeira para um array
            $table->dropColumn('unidade_id');
        });

        // Remover o relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['unidade_id']); // Altere o nome da chave estrangeira para um array
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
