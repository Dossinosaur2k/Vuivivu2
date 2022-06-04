<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAdsTable.
 */
class CreateAdsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ads', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedBigInteger('user_id');
			$table->string('name');
			$table->string('image_path');
			$table->string('url');
			$table->integer('status')->comment('1- kích hoạt, 0- vô hiệu hóa')->default(1);
			$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
		Schema::drop('ads');
	}
}
