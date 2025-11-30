<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class ListProduct extends Component
{
    public $limit = 8;
    public $title = "Menu Populer";
    public $showViewAll = true;

    public function render()
    {
        $products = Product::with('category')
            ->inRandomOrder()
            ->limit($this->limit)
            ->get();

        return view('livewire.components.list-product', [
            'products' => $products
        ]);
    }
}
