<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_tickets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('did');
			$table->integer('emp_id');
			$table->text('name', 65535);
			$table->text('email', 65535);
			$table->date('date');
			$table->text('subject', 65535);
			$table->text('message', 65535);
			$table->enum('status', array('Pending','Answered','Customer Reply','Closed'))->default('Pending');
			$table->text('admin', 65535);
			$table->text('replyby', 65535)->nullable();
			$table->text('closed_by', 65535)->nullable();
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
		Schema::drop('sys_tickets');
	}

}
