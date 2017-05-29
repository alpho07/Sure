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

$factory->define(App\Property_Owner::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->uuid,
        'P_Owner_ID' => $faker->randomNumber,
        'P_Owner_Names' => $faker->name,
        'P_Owner_Address' => $faker->streetAddress,
        'P_Owner_Phone' => $faker->e164PhoneNumber,
        'P_Owner_Email' => $faker->freeEmail,
        'P_Owner_Type'=> $faker->randomElement($array = array('Individual','Corporate')),
    ];
});
