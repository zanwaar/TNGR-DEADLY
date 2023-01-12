<?php

namespace App\Http\Livewire\Keranjang;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListKeranjang extends Component
{
    public $total;
    public function getCartProperty()
    {
        return Cart::where('user_id', Auth::user()->id)
            ->where('transaksi_id', null)
            ->with(['product'])
            ->get();
    }
    public function render()
    {
        $data = $this->cart;
        return view('livewire.keranjang.list-keranjang', [
            'list' => $data,
        ]);
    }
}
