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

$factory->define(App\Property::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->uuid,
        'LRNo_Block' => $faker->randomNumber,
        'IR_IC_Nos' => $faker->randomNumber,
        'Size' => $faker->randomNumber,
        'Town' => $faker->city,
        'P_Owner_ID'=> function(){
            return factory(App\Property_Owner::class)->create()->P_Owner_ID; 
        },
        'Pr_Other_Details' => $faker->sentence
    ];
});
