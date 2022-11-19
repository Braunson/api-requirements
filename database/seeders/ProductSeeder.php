<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataset = [
            [
                'sku' => '000001',
                'name' => 'Full coverage insurance',
                'category' => 'insurance',
                'price' => 89000,
                'discount_percentage' => null,
            ],
            [
                'sku' => '000002',
                'name' => 'Compact Car X3',
                'category' => 'vehicle',
                'price' => 99000,
                'discount_percentage' => null,
            ],
            [
                'sku' => '000003',
                'name' => 'SUV Vehicle, high end',
                'category' => 'vehicle',
                'price' => 150000,
                'discount_percentage' => 15,
            ],
            [
                'sku' => '000004',
                'name' => 'Basic coverage',
                'category' => 'insurance',
                'price' => 20000,
                'discount_percentage' => null,
            ],
            [
                'sku' => '000005',
                'name' => 'Convertible X2, Electric',
                'category' => 'vehicle',
                'price' => 250000,
                'discount_percentage' => null,
            ],
        ];

        DB::table('products')->insert($dataset);
    }
}
