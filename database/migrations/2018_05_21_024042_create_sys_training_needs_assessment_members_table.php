<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysTrainingNeedsAssessmentMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_training_needs_assessment_members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('training_id');
			$table->integer('emp_id');
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
		Schema::drop('sys_training_needs_assessment_members');
	}

}
