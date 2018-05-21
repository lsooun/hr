<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysTaxRulesDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_tax_rules_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tax_id');
			$table->string('salary_from', 10)->default('0');
			$table->string('salary_to');
			$table->string('tax_percentage')->default('0');
			$table->string('additional_tax_amount')->default('0');
			$table->enum('gender', array('Both','Male','Female'))->default('Both');
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
		Schema::drop('sys_tax_rules_details');
	}

}
