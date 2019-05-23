<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('ids')-> nullable(false);
            $table->integer('Id')-> nullable(false);
            $table->string('Cliente', 100)-> nullable(false);
            $table->integer('Pedido_id')-> nullable(false);
            $table->string('N_mero_pedido', 10)->nullable();
            $table->integer('Id_Projeto')-> nullable(false);
            $table->string('Nome_projeto', 100)-> nullable(false);
            $table->string('Empacotado_por', 25)->nullable();
            $table->datetime('Data_cria_o')->nullable();
            $table->string('Carregado_por', 25)->nullable();
            $table->datetime('Data_carregamento')->nullable();
            $table->string('Conte_do', 347)-> nullable(false);
            $table->integer('Entrega_id')->nullable();
            $table->string('status')->default('carga');
            $table->string('obs')->nullable();
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
        Schema::dropIfExists('controls');
    }
}