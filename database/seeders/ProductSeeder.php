<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = array(
            [
                'name' => 'Arroz',
                'description' => 'arroz - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum ultrices est, nec vehicula magna. Praesent nibh lacus, tincidunt eu venenatis id, varius ac lacus.',
                'price' => 40,
                'currency_id' => 3,
                'tax_cost' => 0.50,
                'manufacturing_cost' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Habichuelas',
                'description' => 'habichuelas - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum ultrices est, nec vehicula magna. Praesent nibh lacus, tincidunt eu venenatis id, varius ac lacus.',
                'price' => 80,
                'currency_id' => 3,
                'tax_cost' => 0.50,
                'manufacturing_cost' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aceite de soya',
                'description' => 'aceite - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum ultrices est, nec vehicula magna. Praesent nibh lacus, tincidunt eu venenatis id, varius ac lacus.',
                'price' => 100,
                'currency_id' => 3,
                'tax_cost' => 1,
                'manufacturing_cost' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        $product = Products::insert($product);
    }
}
