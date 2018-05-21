<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysSmsGatewaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_sms_gateways', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name', 65535);
			$table->text('api_link', 65535)->nullable();
			$table->text('user_name', 65535);
			$table->text('password', 65535);
			$table->text('api_id', 65535)->nullable();
			$table->enum('status', array('Active','Inactive'));
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
		Schema::drop('sys_sms_gateways');
	}

}
