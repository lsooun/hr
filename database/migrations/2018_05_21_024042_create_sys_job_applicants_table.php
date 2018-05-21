<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysJobApplicantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_job_applicants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('job_id');
			$table->string('name', 100);
			$table->string('email', 150);
			$table->string('phone', 20);
			$table->enum('status', array('Unread','Rejected','Primary Selected','Call For Interview','Confirm'))->default('Unread');
			$table->text('resume', 65535);
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
		Schema::drop('sys_job_applicants');
	}

}
