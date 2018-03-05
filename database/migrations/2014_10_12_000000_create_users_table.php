<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->string('nickname')->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
<<<<<<< HEAD
            $table->string('rol')->nullable(false)->default("Usuario");
=======
            $table->string('rol')->nullable(false)->default("Cliente");
>>>>>>> d7e44d8f84da5f8fe7df22dbd6580719ca5f1a19
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
