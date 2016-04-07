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

$factory->define(App\Domains\User\User::class, function (Faker\Generator $faker) {
    return [
        'first_name'=> $faker->firstName,
        'last_name' => $faker->lastName,
        'email'     => $faker->email,
        'password'  => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Domains\User\Profile::class, function (Faker\Generator $faker) {
    return [
        'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now') ,
        'phone'      => $faker->phoneNumber,
        'img'        => 'img.png',
        'about_you'  => $faker->realText($maxNbChars = 80, $indexSize = 2),
        'genre'      => '',
    ];
});

$factory->define(App\Domains\Client\Client::class, function (Faker\Generator $faker) {
    return [
        'name'=> $faker->firstName,
        'email'     => $faker->email,
        'phone'      => $faker->phoneNumber,
        'type'       => 'j'
    ];
});

$factory->define(App\Domains\Client\Legal::class, function (Faker\Generator $faker) {
    return [
        'cnpj'=> $faker->randomNumber(2),
        'company_name'     => $faker->company,
      ];
});

$factory->define(App\Domains\Location\Location::class, function (Faker\Generator $faker) {
    return[
        'address'   => $faker->streetName,
        'number'    => $faker->buildingNumber,
        'city'      => $faker->city,
        'zip_code'  => $faker->postcode,
        'district'  => $faker->country,
        'state'     => $faker->state,
        'state_abbr'=> $faker->stateAbbr,
    ];
});





