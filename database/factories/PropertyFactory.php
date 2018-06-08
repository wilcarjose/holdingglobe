<?php

use Faker\Generator as Faker;
use Holdingglobe\Models\Property;
use Holdingglobe\Models\SaleType;
use Holdingglobe\Models\PropertyType;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Property::class, function (Faker $faker) {

    $title = $faker->sentence($nbWords = 5, $variableNbWords = true);
    
    return [
        'title' => $title,
        'slug' => generateSlug($title),
        'details' => $faker->text,
        'price' => $faker->randomFloat($decimals = 2, $min = 1, $max = 9999999.99),
        'sale_type_id' => SaleType::inRandomOrder()->first() ?: factory(SaleType::class)->create(),
        'property_type_id' => PropertyType::inRandomOrder()->first() ?: factory(PropertyType::class)->create(),
        'city_id' => 1,
        'address_1' => $faker->text(100),
        'address_2' => $faker->text(100),
        'address_3' => $faker->text(100),
        'number_of_beds' => $faker->numberBetween($min = 1, $max = 10),
        'number_of_baths' => $faker->numberBetween($min = 1, $max = 10),
        'pet_allowed' => $faker->boolean,
        'dishwasher' => $faker->boolean,
        'furnished' => $faker->boolean,
        'photo' => (string)$faker->numberBetween($min = 1, $max = 5).'.jpg',
        'active' => true,
        'sold' => false,
    ];
});
