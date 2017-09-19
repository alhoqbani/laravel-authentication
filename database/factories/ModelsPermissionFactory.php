<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Permission::class, function (Faker $faker) {
    return [
        'role_id' => function() {
            return factory(\App\User::class)->create()->id;
        },
        'title' => $faker->word
    ];
});
