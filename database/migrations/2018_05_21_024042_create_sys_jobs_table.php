<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_jobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('position');
			$table->integer('no_position');
			$table->enum('job_type', array('Contractual','Part Time','Full Time'))->nullable();
			$table->text('experience', 65535)->nullable();
			$table->text('age', 65535)->nullable();
			$table->text('job_location', 65535)->nullable();
			$table->text('salary_range', 65535)->nullable();
			$table->text('short_description', 65535)->nullable();
			$table->date('post_date');
			$table->date('apply_date')->nullable();
			$table->date('close_date')->nullable();
			$table->enum('status', array('opening','closed','drafted'));
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
		Schema::drop('sys_jobs');
	}

}
