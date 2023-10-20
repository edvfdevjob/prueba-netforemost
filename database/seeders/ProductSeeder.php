<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Iphone',
            'description' => 'Telefono de gama alta',
            'price' => 25.05,
            'barcode' => 12322354,
        ]);
    }
}
