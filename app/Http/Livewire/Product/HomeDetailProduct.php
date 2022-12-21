<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class HomeDetailProduct extends Component
{
    public $counter;
    public $size;

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

    public function mount()
    {
        $this->counter = 1;
        $this->size = 1; //default value 
    }
    public function render()
    {
        return view('livewire.product.home-detail-product');
    }
}
