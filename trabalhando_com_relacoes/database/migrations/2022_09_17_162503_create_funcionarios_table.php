<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome')->nullable();
            $table->char('cpf')->nullable();
            $table->float('salario')->nullable();
            $table->boolean('situacao')->nullable();
            $table->date('data_contratacao')->nullable();
            $table->date('data_demissao')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('funcionarios');
    }
}
