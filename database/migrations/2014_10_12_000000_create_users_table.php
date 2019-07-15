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
      
      //Se crea la tabla rol  
      Schema::create('rol', function (Blueprint $table) {
           $table->increments('id');
            $table->string('nombre',30);
            $table->string('descripcion',255);
            $table->boolean('condicion')->default(1);
            $table->timestamps();
        }); 
      //Se crea la tabla usuario
      Schema::create('users', function (Blueprint $table) {
          // $table->increments('idusuario');   
          $table->increments('id');
          $table->integer('idrol')->unsigned()->nullable();
         $table->string('nombre',100);
        $table->string('apellido',100);
        $table->string('cargo',50);
        $table->string('pais',50);
           $table->string('telefono',20);
        $table->string('extension',20); 
        $table->string('idioma',20);
            $table->string('email',50);
        $table->string('usuario')->unique();;
          $table->string('password',64);
          $table->boolean('condicion')->default(1);
          $table->timestamps(); 
          $table->foreign('idrol')->references('id')->on('rol')->onDelete('cascade');
        });
     
     //se crea la tabla de academia
      Schema::create('academia', function (Blueprint $table) {
          // $table->increments('idusuario');   
          $table->increments('id');
          $table->integer('id_usuario')->unsigned()->nullable();
         $table->string('nombre',100);
           $table->string('direccion',60); 
         $table->string('direccion2',60);
         $table->string('pais',60); 
         $table->string('estado',60); 
         $table->string('ciudad',60); 
         $table->string('codigo',60); 
         $table->string('url',60); 
         $table->string('institucion',60); 
          $table->boolean('condicion')->default(1);
          $table->timestamps(); 
          $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
     
      //se crea la tabla de instructores
     Schema::create('instructor', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_academia')->unsigned()->nullable();
          $table->string('nombre',100);
          $table->string('telefono',60);
          $table->string('email',60);
          $table->boolean('condicion')->default(1);
          $table->timestamps(); 
            $table->foreign('id_academia')->references('id')->on('academia')->onDelete('cascade');
     
        });
     
      //se crea la tabla de materia
     Schema::create('materia', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre',100); 
          $table->boolean('condicion')->default(1);
          $table->timestamps();  
        });
      //se crea la tabla de historial
     Schema::create('historial', function (Blueprint $table) {
          $table->increments('id');
       $table->integer('id_academia')->unsigned()->nullable();
          $table->integer('id_materia')->unsigned()->nullable();
          $table->integer('id_instructor')->unsigned()->nullable();
          $table->string('status',100);
          $table->date('fecha_inicio');
          $table->date('fecha_termino');
          $table->boolean('condicion')->default(1);
          $table->timestamps(); 
       
         $table->foreign('id_academia')->references('id')->on('academia')->onDelete('cascade');
       $table->foreign('id_materia')->references('id')->on('materia')->onDelete('cascade');
       $table->foreign('id_instructor')->references('id')->on('instructor')->onDelete('cascade');
     
       
        });
     /*
     //se crea la tabla de alumno
     Schema::create('alumno', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre',100); 
          $table->boolean('condicion')->default(1);
          $table->timestamps();  
        });
      //se crea la tabla de alumno/materia
     Schema::create('alumno_materia', function (Blueprint $table) {
          $table->integer('id_materia')->unsigned()->nullable();
          $table->integer('id_alumno')->unsigned()->nullable();
          $table->boolean('condicion')->default(1);
          $table->foreign('id_materia')->references('id')->on('materia');
          $table->foreign('id_alumno')->references('id')->on('alumno');
          $table->timestamps();  
        });
     //se crea la tabla de grupos
     Schema::create('grupo', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_instructor')->unsigned()->nullable();
          $table->integer('id_academia')->unsigned()->nullable();
          $table->integer('id_materia')->unsigned()->nullable();
          $table->string('nombre',100);
          $table->boolean('condicion')->default(1);
          $table->timestamps(); 
          $table->foreign('id_instructor')->references('id')->on('instructor')->onDelete('cascade');
          $table->foreign('id_academia')->references('id')->on('academia')->onDelete('cascade');
       $table->foreign('id_materia')->references('id')->on('materia')->onDelete('cascade');
        });
     */
     
     
     
     
     /////////////////////////////////////////////
    }
     
    


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
      Schema::dropIfExists('rol');
       Schema::dropIfExists('instructor');
      Schema::dropIfExists('usuario');
       Schema::dropIfExists('grupo');
       Schema::dropIfExists('alumno');
       Schema::dropIfExists('academia');
       Schema::dropIfExists('materia');
       Schema::dropIfExists('alumno_materia');
    }
}
