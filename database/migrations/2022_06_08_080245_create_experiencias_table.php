<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->nullable();
            $table->foreignId('experiencia_tipo_id')->nullable();
            $table->longText('descricao')->nullable();
            $table->foreign('candidato_id')
                ->references('id')->on('candidatos')->onDelete('cascade');
            $table->foreign('experiencia_tipo_id')
                ->references('id')->on('experiencias_tipos');
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
        Schema::dropIfExists('experiencias');
    }
};
