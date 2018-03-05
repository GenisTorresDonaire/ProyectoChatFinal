<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionDeTablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Admin', function (Blueprint $table) {
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->string('rol');
        });

        Schema::create('Denuncias', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->string('imagen');
            $table->integer('id_usuario')->unsigned();
            $table->text('respuesta');
            $table->string('ubicacion');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('resuelto')->default(false);
            $table->timestamps();
        });

        Schema::create('Chats', function (Blueprint $table) {
            $table->integer('id_origen')->unsigned();
            $table->foreign('id_origen')->references('id')->on('users')->onDelete('cascade');
            $table->text('mensaje');
            $table->integer('id_destino')->unsigned();
            $table->foreign('id_destino')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('Grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('Mensajes', function (Blueprint $table) {
            $table->integer('id_grupo')->unsigned();
            $table->foreign('id_grupo')->references('id')->on('Grupos')->onDelete('cascade');
            $table->text('mensaje');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('Participantes', function (Blueprint $table) {
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('Grupos')->onDelete('cascade');
            $table->integer('id_grupo')->unsigned();
            $table->foreign('id_grupo')->references('id')->on('Grupos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('Noticias', function (Blueprint $table) {
            $table->increments('id_noticia');
            $table->integer('id_usuario')->unsigned();
            $table->string('imagen');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->text('categoria');
            $table->text('texto');
            $table->text('titulo');
            $table->integer('importante');
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
        //
    }
}
