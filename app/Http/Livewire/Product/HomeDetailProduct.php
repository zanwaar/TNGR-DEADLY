<?php

namespace App\Http\Livewire\Product;

use App\Models\Cart;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
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
    public function createChart()
    {
        $user = Auth::user();
        $cart = Cart::where('product_id', $this->state['id'])->first();

        if (!$user) {
            return $this->dispatchBrowserEvent('alert-danger', ['message' => 'sorry, you are not logged in']);
        }
        if (!$cart) {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $this->state['id'],
                'jumlah' => $this->counter,
            ]);
            $this->emit('addcart');
            $this->dispatchBrowserEvent('alert-success', ['message' => 'added successfully!']);
        } else {
            $cart->update([
                'jumlah' => $this->counter,
            ]);
            $this->emit('addcart');
        }
    }
    public function render()
    {
        return view('livewire.product.home-detail-product');
    }
}
