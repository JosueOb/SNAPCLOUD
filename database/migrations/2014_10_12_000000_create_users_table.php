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
            $table->bigIncrements('id');//incremento automático sin signo (primary key)
            $table->string('name',50);//varchar con una longitud opcional
            $table->string('email')->unique();// varchar y se le agrega un índice único
            $table->string('avatar')->nullable();
            $table->string('state')->nullable();
            $table->string('username',50)->unique();
            $table->timestamp('email_verified_at')->nullable();//equivale a una columna TIMESTAMP y se acepta valores null
            $table->string('password');//varchar con una longitud por defecto de 255
            $table->rememberToken();//equivalente a la columna remember_token VARCHAR(100) que acepta valores null
            $table->timestamps();//agrega la columna created_at y updated_at de tipo TIMESTAMP y que acepta valores null
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
