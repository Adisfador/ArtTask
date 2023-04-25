<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleDescrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $txt=$this->faker->realText(rand(200,4000));
        return [
            "img"=>'500x500',
            "descr"=>$txt,
            "article_id"=>$this->faker->unique()->numberBetween(1, 100),
        ];
    }
}
