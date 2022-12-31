<?php

namespace App\Http\Livewire\Product;

use App\Models\Kategori;
use App\Models\Product;
use Livewire\Component;

class HomeDetailProduct extends Component
{
    public $counter;
    public $size;
    public $state = [];
    public $product;
    public $ktg;
    public function mount(Product $product)
    {
        $this->state = $product->toArray();
        $this->ktg = Kategori::find($this->state['kategori_id']);
        $this->counter = 1;
        $this->size = 1; //default value 
    }

    public function increment()
    {
        // $this->counter = $this->counter + $this->size;
        $this->counter += $this->size;
    }

    public function decrement()
    {
        if ($this->counter <= 1) {
            return $this->counter = 1;
        }
        return $this->counter -= $this->size;
    }

    public function render()
    {
        return view('livewire.product.home-detail-product');
    }
}
