<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(PostsTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(UserTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
