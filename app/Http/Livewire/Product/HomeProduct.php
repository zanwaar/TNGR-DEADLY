<?php

namespace App\Http\Livewire\Product;

use App\Http\Livewire\AppComponent;
use App\Models\Kategori;
use App\Models\Product;
use Livewire\Component;

class HomeProduct extends AppComponent
{
    public $filter = null;
    public function filter($filter = null)
    {
        $this->resetPage();

        $this->filter = $filter;
    }
    
    public function getProductProperty()
    {
        return Product::latest()->with(['kategori'])
            ->when($this->filter, function ($query, $filter) {
                return $query->whereRelation('kategori', 'kategori', $filter);
            })
            ->paginate(9);
    }

    public function render()
    {
        $data = $this->product;
        $dataktg = Kategori::all();
        return view('livewire.product.home-product', ['data' => $data, 'kategori' => $dataktg]);
    }
}
