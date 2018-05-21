<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysPayrollTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_payroll', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('emp_id');
			$table->integer('department');
			$table->integer('designation');
			$table->string('payment_month', 100);
			$table->date('payment_date')->default('2016-09-04');
			$table->string('net_salary', 50);
			$table->string('tax', 50);
			$table->string('provident_fund', 50)->default('0');
			$table->string('loan', 50)->default('0');
			$table->string('overtime_salary', 50);
			$table->string('total_salary', 50);
			$table->enum('payment_type', array('Cash Payment','Bank Payment','Cheque Payment'));
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
		Schema::drop('sys_payroll');
	}

}
