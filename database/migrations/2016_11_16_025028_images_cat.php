<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImagesCat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('image_type_name' , 60)->comment('图片类别名称(类别文件夹名称)');
            $table->string('image_type_title' , 60)->comment('图片类别别名');
            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
