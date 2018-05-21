<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysProvidentFundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_provident_fund', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('emp_id');
			$table->enum('provident_fund_type', array('Fixed Amount','Percentage of Basic Salary'))->default('Percentage of Basic Salary');
			$table->string('employee_share', 10)->default('0');
			$table->string('organization_share', 10)->default('0');
			$table->text('description', 65535)->nullable();
			$table->decimal('total', 10)->default(0.00);
			$table->enum('payment_type', array('Cash Payment','Bank Payment','Cheque Payment'))->nullable();
			$table->enum('status', array('Paid','Unpaid'))->default('Unpaid');
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
		Schema::drop('sys_provident_fund');
	}

}
