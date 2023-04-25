<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Article::factory(100)->create();
        \App\Models\ArticleDescr::factory(100)->create();
        \App\Models\Tags::factory(10)->create();
        $this->call(ArticleDescrSeeder::class);
        // \App\Models\TagRelation::factory(100)->create();

    }
}
