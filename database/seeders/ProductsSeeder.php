<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{ 
    public function run(): void
    {
        $product1 = Products::create([
            'name'=>'product1',
            'price'=>664

        ]);
       $product2 =  Products::create([
        'name'=>'product2',
        'price'=>444
        ]);

    }
}
