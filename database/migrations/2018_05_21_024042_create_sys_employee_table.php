<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysEmployeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_employee', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fname', 50);
			$table->string('lname', 50)->nullable();
			$table->string('employee_code', 50)->nullable();
			$table->integer('designation');
			$table->integer('department');
			$table->integer('role_id');
			$table->string('user_name', 50);
			$table->string('email', 100);
			$table->text('password', 65535);
			$table->string('father_name', 100)->nullable();
			$table->string('mother_name', 100)->nullable();
			$table->date('dob')->nullable();
			$table->date('doj')->nullable();
			$table->date('dol')->nullable();
			$table->string('phone', 30)->nullable();
			$table->string('phone2', 30)->nullable();
			$table->text('pre_address', 65535)->nullable();
			$table->text('per_address', 65535)->nullable();
			$table->text('avatar', 65535)->nullable();
			$table->enum('status', array('active','inactive'))->default('active');
			$table->enum('gender', array('Male','Female'));
			$table->enum('payment_type', array('Monthly','Hourly'))->default('Hourly');
			$table->decimal('basic_salary', 10)->default(0.00);
			$table->decimal('overtime_salary', 10)->default(0.00);
			$table->decimal('basic_salary_increment', 10)->default(0.00);
			$table->decimal('overtime_salary_increment', 10)->default(0.00);
			$table->integer('tax_id');
			$table->string('working_hourly_rate', 10)->default('0');
			$table->string('overtime_hourly_rate', 10)->default('0');
			$table->string('working_hourly_increment_rate', 10)->default('0');
			$table->string('overtime_hourly_increment_rate', 10)->default('0');
			$table->text('passwordresetkey', 65535)->nullable();
			$table->text('remember_token', 65535)->nullable();
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
		Schema::drop('sys_employee');
	}

}
