<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysExpenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_expense', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('item_name', 100);
			$table->text('purchase_from', 65535)->nullable();
			$table->date('purchase_date');
			$table->integer('purchase_by');
			$table->decimal('amount', 10);
			$table->enum('status', array('Pending','Approved','Cancel'))->default('Pending');
			$table->text('bill_copy', 65535)->nullable();
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
		Schema::drop('sys_expense');
	}

}
