<?php

namespace App\Http\Livewire\Keranjang;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TotalKeranjang extends Component
{

    public $cartCount;
    protected $listeners = ['addcart' => 'cartCountUpdated'];

    public function mount()
    {
        $this->cartCountUpdated();
    }
    public function cartCountUpdated()
    {
        $this->cartCount = Cart::where('user_id', Auth::user()->id)
            ->where('transaksi_id', null)
            ->sum('jumlah');
    } 
    public function render()
    {
        return view('livewire.keranjang.total-keranjang');
    }
}
