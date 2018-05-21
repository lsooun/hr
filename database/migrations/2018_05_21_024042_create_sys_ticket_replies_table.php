<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysTicketRepliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_ticket_replies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tid');
			$table->integer('emp_id');
			$table->text('name', 65535);
			$table->date('date');
			$table->text('message', 65535);
			$table->text('admin', 65535)->nullable();
			$table->text('image', 65535)->nullable();
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
		Schema::drop('sys_ticket_replies');
	}

}
