<?php

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => factory(Category::class),
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomFloat(2, 10, 5000),
    ];
});
