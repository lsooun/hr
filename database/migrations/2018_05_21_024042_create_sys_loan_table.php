<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysLoanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_loan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('emp_id');
			$table->text('title', 65535);
			$table->date('loan_date');
			$table->decimal('amount', 10)->default(0.00);
			$table->enum('enable_payslip', array('yes','no'))->default('yes');
			$table->decimal('repayment_amount', 10)->default(0.00);
			$table->decimal('remaining_amount', 10)->default(0.00);
			$table->date('repayment_start_date');
			$table->text('description', 65535)->nullable();
			$table->enum('status', array('ongoing','completed','rejected','pending'))->default('pending');
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
		Schema::drop('sys_loan');
	}

}
