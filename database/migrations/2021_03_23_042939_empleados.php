<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('empleados',function(Blueprint $table){
            $table->increments('idem');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('email',40);
            $table->string('celular',40);
            $table->string('img',255);
            $table->string('sexo',40);
            
            


            $table->integer('ide')->unsigned();
            $table->foreign('ide')->references('ide')->on('estados');

            $table->integer('idd')->unsigned();
            $table->foreign('idd')->references('idd')->on('departamentos');


           

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
     Schema::drop('empleados');
    }
}
