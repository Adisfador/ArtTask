<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->unique()->sentence(rand(3,8),true);
        $createdAt=$this->faker->dateTimeBetween('-3 months','-3 days');
        return [
            "title"=>$title,
            "slug"=>Str::slug($title),
            "img_mini"=>'300x300',
            "created_at"=>$createdAt,
            "updated_at"=>$createdAt
        ];
    }
}
