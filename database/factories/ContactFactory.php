<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        // laravel is smart enough to know if there is no user_id being overwritten
        // if it sees a user_id, then it won't create another user
        // same as factory(User::class)->create(); , but handles the case of there already being a user_id
        'user_id' => factory(User::class),
        'name' => $faker->name,
        'email' => $faker->email,
        'birthday' => '05/14/1999',
        'company' => $faker->company,
    ];
});
