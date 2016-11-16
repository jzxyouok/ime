<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('images');

        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_title' , 120)->comment('图片标题');
            $table->string('image_name' , 60)->comment('图片名称');
            $table->string('image_path' , 120)->comment('图片地址');
            $table->string('image_path_name',120)->comment('图片相对服务器路径');
            $table->unsignedSmallInteger('image_type')->comment('图片类别');
            $table->unsignedInteger('image_size')->comment('图片尺寸大小');
            $table->unsignedInteger('created_at');
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
