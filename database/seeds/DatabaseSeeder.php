<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 数据生成
     *
     * @return void
     */
    public function run()
    {
        $this->call(admin::class);
        $this->call(categories_status::class);
        $this->call(comments_status::class);
        $this->call(links_status::class);
        $this->call(system_set::class);
        $this->call(messages_status::class);
    }
}
