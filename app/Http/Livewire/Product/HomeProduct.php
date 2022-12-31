<?php

namespace App\Http\Livewire\Product;

use App\Models\Kategori;
use App\Models\Product;
use Livewire\Component;

class HomeProduct extends Component
{
    public function render()
    {
        $data = Product::all();
        
        return view('livewire.product.home-product', ['data' => $data]);
    }
}
