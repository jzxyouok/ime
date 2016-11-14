<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class categories_status extends Seeder
{
    /**
     * Run the database seeds.
     * 栏目状态
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories_status')
            ->insert([
                ['id'    =>  0, 'cat_status_name'   =>  '显示'],
                ['id'    =>  1, 'cat_status_name'   => '隐藏']
            ]);
    }
}
