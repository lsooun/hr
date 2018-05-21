<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysEmployeeTrainingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_employee_training', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('training_type', array('Online Training','Seminar','Lecture','Workshop','Hands On Training','Webinar'));
			$table->enum('training_subject', array('HR Training','Employees Development','IT Training','Finance Training','Others'));
			$table->enum('training_nature', array('Internal','External'));
			$table->text('title', 65535);
			$table->integer('trainer')->nullable();
			$table->text('training_location', 65535)->nullable();
			$table->text('sponsored_by', 65535)->nullable();
			$table->text('organized_by', 65535)->nullable();
			$table->date('training_from');
			$table->date('training_to');
			$table->text('description', 65535)->nullable();
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
		Schema::drop('sys_employee_training');
	}

}
