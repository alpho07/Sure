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

$factory->define(App\Po_Plans::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->uuid,
        'PO_Plan_ID' => $faker->randomNumber,
        'PlanID'=> function(){
            return factory(App\Plans::class)->create()->PlanID; 
        },
        'Plan_Start_Date' => $faker->date,
        'Plan_End_Date' => $faker->date
    ];
});
