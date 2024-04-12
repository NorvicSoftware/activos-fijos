    <?php

use App\Models\Inventory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Inventory::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'start_date' => $faker->date,
        'final_date' => $faker->date,
        'details' => $faker->paragraph,
        'number_books' => $faker->numberBetween(1, 100),
        // Aquí podrías definir cómo obtener el manager_id, dependiendo de cómo estén configuradas tus relaciones en el modelo
        'manager_id' => function () {
            return factory(App\Models\Manager::class)->create()->id;
        },
    ];
});
