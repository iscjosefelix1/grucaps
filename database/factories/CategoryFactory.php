<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        //agrega los cursos que son falsos
        'name' => $faker->randomElement(['PHP', 'JAVASCRIPT', 'JAVA', 'DISEÑO WEB', 'SERVIDORES', 'MYSQL', 'NOSQL', 'BIGDATA', 'AMAZON WEB SERVICES']),
        'description' => $faker->sentence
    ];
});
