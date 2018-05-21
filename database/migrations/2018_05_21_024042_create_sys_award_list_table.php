<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysAwardListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_award_list', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('emp_id', 65535);
			$table->integer('award');
			$table->string('gift', 200);
			$table->string('cash', 100)->nullable();
			$table->string('month', 20);
			$table->integer('year');
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
		Schema::drop('sys_award_list');
	}

}
