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
use Carbon\Carbon;
use App\Models\Parties;
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'voterroles_id' => $faker->numberBetween($min = 2, $max = 3),
        'rijksregister' => $faker->numberBetween(10, 99) . "." . $faker->numberBetween(0, 13) . "." . $faker->numberBetween(0, 31) . "-" . $faker->numberBetween(0, 999).".".$faker->numberBetween(0, 100),
        'birth' => Carbon::create($faker->numberBetween(1910, 1999), $faker->numberBetween(0, 12), $faker->numberBetween(0, 31))->toDateString()
    ];
});
$factory->define(App\Models\Admin::class, function (Faker\Generator $faker) {
    static $password;
    return [
         'name' => $faker->name,
         'email' => $faker->unique()->safeEmail,
         'password' => $password ?: $password = bcrypt('secret'),
         'superadmin' => $faker->boolean,
         'softdeleted' => false,
         'remember_token' => str_random(10),

    ];
});
$factory->define(App\Models\Candidates::class, function (Faker\Generator $faker) {

    return [
        'positionid' => $faker->numberBetween($min = 1, $max = 30),
        'name' =>$faker->name,
        'votes' => 0,
        'deleted' => false,
        'parties_id' => $faker->randomElement(Parties::all()->pluck('id')->toArray()),

    ];
});

$factory->define(App\Models\Vote::class, function (Faker\Generator $faker) {

    $dt = Carbon::now();
    return [

        'user_id' => $faker->unique()->numberBetween($min = 2, $max = 81),
        'partie' => $faker->randomElement(Parties::all()->pluck('name')->toArray()),
        'candidates' => null,
        'election_id' => 1,
        'created_at' => Carbon::create($dt->year , $dt->month, $dt->day, $faker->numberBetween($min = 9, $max = 20), $faker->numberBetween($min = 0, $max = 60), $faker->numberBetween($min = 0, $max = 60))

    ];
});