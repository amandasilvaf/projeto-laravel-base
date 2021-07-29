<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->integer('estoque');
            $table->string('descricao')->nullable();
            $table->double('valor-atual');
            $table->timestamps();
        });
    }
     
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
