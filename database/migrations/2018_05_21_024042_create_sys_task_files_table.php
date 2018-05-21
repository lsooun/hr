<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysTaskFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_task_files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('task_id');
			$table->integer('emp_id');
			$table->text('file_title', 65535);
			$table->string('file_size', 20);
			$table->text('file', 65535);
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
		Schema::drop('sys_task_files');
	}

}
