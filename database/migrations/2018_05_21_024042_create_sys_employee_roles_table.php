<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysEmployeeRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_employee_roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('role_name', 65535);
			$table->enum('status', array('Active','Inactive'))->default('Active');
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
		Schema::drop('sys_employee_roles');
	}

}
