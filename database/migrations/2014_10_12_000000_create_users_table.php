<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * 管理员表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name' , 20)->unique()->comment('用户名');
            $table->string('email' , 40)->unique()->default('')->comment('联系邮箱');
            $table->string('password' , 255);
            $table->string('thumb' , 60)->default('')->comment('缩略头像');
            $table->string('content' , 500)->default('')->comment('个人简介');
            $table->rememberToken()->default('');
            $table->integer('created_at')->unsigned();
            $table->integer('updated_at')->unsigned();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
