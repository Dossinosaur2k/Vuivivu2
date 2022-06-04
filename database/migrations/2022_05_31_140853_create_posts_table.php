<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePostsTable.
 */
class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedBigInteger('User_id');
			$table->integer('category_id')->unsigned();
			$table->string('name');
			$table->string('slug');
			$table->longText('title');
			$table->longText('content');
			$table->string('image_path');
			$table->foreign('User_id')->references('id')->on('users')->onDelete('set null');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
		Schema::drop('posts');
	}
}
