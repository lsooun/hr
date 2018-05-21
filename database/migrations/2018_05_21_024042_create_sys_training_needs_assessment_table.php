<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysTrainingNeedsAssessmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_training_needs_assessment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('department');
			$table->enum('training_type', array('Online Training','Seminar','Lecture','Workshop','Hands On Training','Webinar'));
			$table->enum('training_subject', array('HR Training','Employees Development','IT Training','Finance Training','Others'));
			$table->enum('training_nature', array('Internal','External'));
			$table->text('title', 65535);
			$table->text('training_reason', 65535)->nullable();
			$table->integer('trainer')->nullable();
			$table->text('training_location', 65535)->nullable();
			$table->date('training_from');
			$table->date('training_to');
			$table->decimal('training_cost', 10)->default(0.00);
			$table->decimal('travel_cost', 10)->default(0.00);
			$table->enum('status', array('pending','approved','rejected','completed'))->default('pending');
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
		Schema::drop('sys_training_needs_assessment');
	}

}
