<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;


class ArticleDescrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = [];

        for ($g = 1; $g <= 2; $g++) {
            for ($i = 1; $i <= 100; $i++) {
                $relations[] = [
                    "tag_id" => rand(1, 10),
                    "article_id" => $i,
                ];
            }
        }
        for ($i = 1; $i <= 100; $i++) {
            $relations[] = [
                "tag_id" => 1,
                "article_id" => $i,
            ];
        }
        $res=array_unique($relations, SORT_REGULAR);

        DB::table("tag_relations")->insert($res);
    }
}
