<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->startingValue(100);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cover_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->unsigned();
            $table->foreign('role')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');
            $table->integer('status')->comment('1- kích hoạt, 0- vô hiệu hóa')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
