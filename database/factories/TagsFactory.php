<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tag=$this->faker->unique()->word;
        return [
            "tag"=>$tag,
        ];
    }
}
