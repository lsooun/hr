<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysEmailTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_email_templates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('tplname', 65535);
			$table->text('subject', 65535);
			$table->text('message', 65535);
			$table->enum('status', array('1','0'))->default('1');
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
		Schema::drop('sys_email_templates');
	}

}
