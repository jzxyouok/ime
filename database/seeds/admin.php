<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     * 管理员生成
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'name'  =>  'tizips',
                'email' =>  'tizips@foxmail.com',
                'password'  =>  '$2y$10$ryzkYt3Vgr1EYNNsCvtXNOOEOoFJa3KG0QerZGjA4HT01.GpmzCd2',
                'created_at'    =>  '1475280000',
                'updated_at'    =>  '0'
            ]);
    }
}
