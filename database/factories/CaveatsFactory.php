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

$factory->define(App\Caveats::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->uuid,
        'Caveat_Date' => $faker->date,
        'Caveat_Ref' => $faker->randomNumber,
        'Description' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'Enquiry_Details' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'LR_No' => function(){
            return factory(App\Property::class)->create()->LRNo_Block; 
        },
        'Document_Uploads'=> $faker->file($sourceDir = 'public', $targetDir = 'resources', false)  
    ];
});
