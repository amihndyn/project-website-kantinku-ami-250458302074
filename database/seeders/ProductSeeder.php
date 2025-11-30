<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        
        $products = [
            // MAKANAN
            [
                'name' => 'Nasi Goreng Spesial',
                'description' => 'Nasi goreng dengan telur, ayam, dan sayuran segar',
                'price' => 15000,
                'category_id' => $categories->where('slug', 'makanan')->first()->id,
                'image_path' => 'foods/nasi-goreng.jpg'
            ],
            [
                'name' => 'Mie Ayam Bakso',
                'description' => 'Mie ayam dengan bakso urat dan pangsit goreng',
                'price' => 12000,
                'category_id' => $categories->where('slug', 'makanan')->first()->id,
                'image_path' => 'foods/mie-ayam.jpg'
            ],
            [
                'name' => 'Ayam Geprek',
                'description' => 'Ayam crispy dengan sambal bawang yang menggugah selera',
                'price' => 18000,
                'category_id' => $categories->where('slug', 'makanan')->first()->id,
                'image_path' => 'foods/ayam-geprek.jpg'
            ],
            [
                'name' => 'Gado-gado',
                'description' => 'Salad Indonesia dengan sayuran segar dan bumbu kacang',
                'price' => 10000,
                'category_id' => $categories->where('slug', 'makanan')->first()->id,
                'image_path' => 'foods/gado-gado.jpg'
            ],

            // SNACK
            [
                'name' => 'Risoles Mayo',
                'description' => 'Risoles goreng dengan isian ragout dan mayonnaise',
                'price' => 5000,
                'category_id' => $categories->where('slug', 'snack')->first()->id,
                'image_path' => 'snacks/risoles.jpg'
            ],
            [
                'name' => 'Pastel',
                'description' => 'Pastel goreng dengan isian bihun dan sayuran',
                'price' => 4000,
                'category_id' => $categories->where('slug', 'snack')->first()->id,
                'image_path' => 'snacks/pastel.jpg'
            ],
            [
                'name' => 'Cimol Pedas',
                'description' => 'Cimol kenyal dengan bubuk pedas',
                'price' => 7000,
                'category_id' => $categories->where('slug', 'snack')->first()->id,
                'image_path' => 'snacks/cimol.jpg'
            ],
            [
                'name' => 'Kentang Goreng',
                'description' => 'Kentang goreng crispy dengan saus tomat',
                'price' => 8000,
                'category_id' => $categories->where('slug', 'snack')->first()->id,
                'image_path' => 'snacks/kentang-goreng.jpg'
            ],

            // MINUMAN
            [
                'name' => 'Es Teh Manis',
                'description' => 'Es teh segar dengan gula pasir',
                'price' => 5000,
                'category_id' => $categories->where('slug', 'minuman')->first()->id,
                'image_path' => 'drinks/es-teh.jpg'
            ],
            [
                'name' => 'Jus Alpukat',
                'description' => 'Jus alpukat segar dengan susu dan gula aren',
                'price' => 12000,
                'category_id' => $categories->where('slug', 'minuman')->first()->id,
                'image_path' => 'drinks/jus-alpukat.jpg'
            ],
            [
                'name' => 'Kopi Susu',
                'description' => 'Kopi hitam dengan susu segar dan gula',
                'price' => 8000,
                'category_id' => $categories->where('slug', 'minuman')->first()->id,
                'image_path' => 'drinks/kopi-susu.jpg'
            ],
            [
                'name' => 'Es Jeruk',
                'description' => 'Es jeruk segar dengan daging jeruk',
                'price' => 7000,
                'category_id' => $categories->where('slug', 'minuman')->first()->id,
                'image_path' => 'drinks/es-jeruk.jpg'
            ],

            // ROTI
            [
                'name' => 'Roti Coklat Keju',
                'description' => 'Roti bakar dengan isian coklat dan keju leleh',
                'price' => 6000,
                'category_id' => $categories->where('slug', 'roti')->first()->id,
                'image_path' => 'breads/roti-coklat.jpg'
            ],
            [
                'name' => 'Donat Gula',
                'description' => 'Donat lembut dengan taburan gula halus',
                'price' => 5000,
                'category_id' => $categories->where('slug', 'roti')->first()->id,
                'image_path' => 'breads/donat.jpg'
            ],
            [
                'name' => 'Croissant',
                'description' => 'Croissant buttery dengan tekstur berlapis',
                'price' => 10000,
                'category_id' => $categories->where('slug', 'roti')->first()->id,
                'image_path' => 'breads/croissant.jpg'
            ],
            [
                'name' => 'Pisang Coklat',
                'description' => 'Roti pisang dengan coklat leleh',
                'price' => 7000,
                'category_id' => $categories->where('slug', 'roti')->first()->id,
                'image_path' => 'breads/pisang-coklat.jpg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}