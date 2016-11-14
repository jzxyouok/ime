<?php

use Illuminate\Database\Seeder;

class links_status extends Seeder
{
    /**
     * Run the database seeds.
     * 友情链接状态
     *
     * @return void
     */
    public function run()
    {
        DB::table('links_status')
            ->insert([
                ['id'    =>  0, 'link_status_name'   =>  '显示'],
                ['id'    =>  1, 'link_status_name'   => '隐藏']
            ]);
    }
}
