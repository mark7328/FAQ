<?php
/**
 * Created by PhpStorm.
 * User: mark7
 * Date: 5/11/2019
 * Time: 4:32 PM
 */

use Faker\Generator as Faker;
$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});