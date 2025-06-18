<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currencies;

class CurrencieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = array(
            [
                'name' => 'Dollar estado unidense',
                'symbol' => 'US',
                'exchange_rate' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Euro',
                'symbol' => 'EU',
                'exchange_rate' => 65,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peso dominicano',
                'symbol' => 'RD',
                'exchange_rate' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        $currencie = Currencies::insert($currencies);

        /*
          $productos = [
            ['nombre' => 'Coca-Cola', 'precio' => 25.00, 'stock' => 100],
            ['nombre' => 'Pepsi', 'precio' => 23.00, 'stock' => 80],
            ['nombre' => 'Sprite', 'precio' => 22.00, 'stock' => 60],
        ];

        foreach ($productos as $data) {
            Producto::create($data);
        }
        */
    }
}
