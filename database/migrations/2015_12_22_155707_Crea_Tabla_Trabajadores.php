<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaTrabajadores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trabajadores', function (Blueprint $tabla) {
			$tabla->increments('id');
			$tabla->string('nombre',64);
			$tabla->string('apellido_p',64);
			$tabla->string('apellido_m',64);
			$tabla->string('rut',12)->unique();
			$tabla->string('email')->unique();
			$tabla->string('direccion',40);
			$tabla->string('telefono',8);
			$tabla->string('cargo',30);
			$tabla->rememberToken();
			$tabla->softDeletes();
			$tabla->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trabajadores');
	}

}
