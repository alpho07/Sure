<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Plans::class, function (Faker\Generator $faker) {

    return [
        'id' => $faker->uuid,
        'PlanID' => $faker->randomnumber,
        'Plan_Name' => $faker->word ,
        'Annual_Rate' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'Plan_Details'=> $faker->sentence($nbWords = 3, $variableNbWords = true),
    ];
});
