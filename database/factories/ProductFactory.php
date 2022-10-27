<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return Category::inRandomOrder()->first()->id;
        },
        'name'         => $faker->name,
        'description'  => '<ul>
            <li>Para trabajos en 3D y 2D.</li>
            <li>Motor fresador de 3 HP. Con variador de frecuencia de 0 a 24.000 RPM.</li>
            <li>Mesa con ranuras T-slot.</li>
            <li>Con ruedas y patas antivibratorias para su fácil traslado.</li>
            <li>Presición: 0.01 mm.</li>
            <li>Velocidad promedio de trabajo: 6 mts/min.</li>
            <li>Estructura de hierro, extra robusta.</li>
            <li>Puente móvil (eje Y).</li>
            <li>Cabezal Z Rotativo de -90º a +90º</li>
            <li>Guías lineales prismáticas a bolillas recirculantes de precisión en los 3 ejes.</li>
            <li>Transmisión a tornillos a bolillas recirculantes cementados en los 3 ejes.</li>
            <li>Motores paso a paso (Drivers de micro-paso) en los 3 ejes, sobredimencionados.</li>
            <li>Control numérico de última generación y fácil manejo.</li>
            </ul>',
        'extra' => 'images/data-sheet/Mask_Group_268.png',
        'extra2' => 'images/data-sheet/Mask_Group_268.png',
        'extra3' => 'images/data-sheet/Mask_Group_268.png',
        'extra4' => 'images/data-sheet/Mask_Group_268.png',
    ];
});

            

