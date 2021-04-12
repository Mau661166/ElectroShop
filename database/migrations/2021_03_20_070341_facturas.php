<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Facturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas',function(Blueprint $table){
            $table->increments('idf');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('email',40);
            $table->string('celular',40);
            $table->string('rfc',40);
            $table->string('razon',40);
            
            $table->string('domicilio',40);


            $table->integer('ide')->unsigned();
            $table->foreign('ide')->references('ide')->on('estados');

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
         schema::drop('facturas');
    }
}
