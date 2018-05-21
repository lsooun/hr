<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysAttendanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_attendance', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('emp_id');
			$table->integer('designation');
			$table->integer('department');
			$table->string('date', 20);
			$table->string('clock_in', 20)->nullable();
			$table->string('clock_in_optional', 20)->nullable();
			$table->string('clock_out', 20)->nullable();
			$table->string('late', 10)->nullable();
			$table->string('early_leaving', 10)->nullable();
			$table->string('overtime', 10)->nullable();
			$table->string('total', 10)->nullable();
			$table->enum('status', array('Absent','Holiday','Present'));
			$table->enum('pay_status', array('Paid','Unpaid'))->default('Unpaid');
			$table->enum('clock_status', array('Clock In','Clock Out'))->default('Clock Out');
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
		Schema::drop('sys_attendance');
	}

}
