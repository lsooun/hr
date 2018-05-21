<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysSupportDepartmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_support_departments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name', 65535);
			$table->text('email', 65535);
			$table->integer('order');
			$table->enum('show', array('Yes','No'))->default('Yes');
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
		Schema::drop('sys_support_departments');
	}

}
