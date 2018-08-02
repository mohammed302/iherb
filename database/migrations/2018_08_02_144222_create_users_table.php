<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email_token', 200);
			$table->string('name');
			$table->string('email')->unique();
			$table->string('address', 200);
			$table->integer('tel');
			$table->string('password');
			$table->string('pass', 100);
			$table->string('about');
			$table->string('image');
			$table->integer('type')->unsigned()->default(1);
			$table->date('date_end');
			$table->integer('verified')->default(0);
			$table->integer('status')->default(1);
			$table->integer('email_verification')->nullable()->default(0);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->timestamp('last_login')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
