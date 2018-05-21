<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysLeaveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_leave', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('emp_id');
			$table->date('leave_from');
			$table->date('leave_to');
			$table->integer('ltype_id');
			$table->date('applied_on');
			$table->string('leave_reason', 100)->nullable();
			$table->enum('status', array('approved','pending','rejected'))->default('pending');
			$table->text('remark', 65535)->nullable();
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
		Schema::drop('sys_leave');
	}

}
