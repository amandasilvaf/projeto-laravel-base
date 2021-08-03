<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlocacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alocacoes', function (Blueprint $table) {
            $table->foreignId('desenvolvedor_id')->constrained('desenvolvedores');
            $table->foreignId('projeto_id')->constrained('projetos');
            $table->integer('horas_trabalhadas');
            $table->timestamps();
            $table->primary(['desenvolvedor_id', 'projeto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alocacoes');
    }
}
