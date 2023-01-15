<?php

namespace App\Http\Livewire\Keranjang;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListKeranjang extends Component
{
    public $total;
    public $state = [];
    public $mcs;

    public function mount()
    {
        $this->mcs = Customer::where('user_id', Auth::user()->id)->first();
        if ($this->mcs !== null) {
            $this->state =  $this->mcs->toArray();
        }
    }
    public function getCartProperty()
    {
        return Cart::where('user_id', Auth::user()->id)
            ->where('transaksi_id', null)
            ->with(['product'])
            ->get();
    }

    public function pesan()
    {
        $cs = Customer::where('user_id', Auth::user()->id)->first();

        if ($cs === null) {
            return $this->dispatchBrowserEvent('alert-danger', ['message' => 'Gagal Silahlkan legkapi Profili']);
        }
        $ts = Transaksi::create([
            'user_id' => Auth::user()->id,
            'invoice' => 'INVOCATION-' . time(),
            'status' => 'Konfirmasi Pembayaran',
            'total' => $this->total,
        ]);
        Cart::where('user_id', Auth::user()->id)
            ->where('transaksi_id', null)
            ->update(['transaksi_id' => $ts->id]);
        $this->dispatchBrowserEvent('alert-success', ['message' => 'added successfully!']);
        redirect()->route('transaksi');

    }
    public function render()
    {
        $data = $this->cart;
        return view('livewire.keranjang.list-keranjang', [
            'list' => $data,
        ]);
    }
}
