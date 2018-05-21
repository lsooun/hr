<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysEmployeeBankAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_employee_bank_accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('bank_name', 100);
			$table->string('branch_name', 100);
			$table->string('account_name', 100);
			$table->string('account_number', 100);
			$table->string('ifsc_code', 100);
			$table->string('pan_no', 100);
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
		Schema::drop('sys_employee_bank_accounts');
	}

}
