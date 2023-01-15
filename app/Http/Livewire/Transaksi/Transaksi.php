<?php

namespace App\Http\Livewire\Transaksi;

use App\Http\Livewire\AppComponent;
use App\Models\Cart;
use App\Models\Transaksi as ModelsTransaksi;
use Illuminate\Support\Facades\Auth;

class Transaksi extends AppComponent
{
    public $ts;
    public $total;
    public $list;
    public $listcount;
    public function getTransaksiProperty()
    {

        return ModelsTransaksi::latest()->where('user_id', Auth::user()->id)->paginate($this->trow);
    }

    public function detail($id)
    {
        $this->reset();
        $ts =  ModelsTransaksi::where('id', $id)->first();
        $this->ts = $ts;
        $list = Cart::where('transaksi_id', $id)->with(['product'])->get();
        $this->list = $list;
        $this->listcount = $list->count();
        $this->dispatchBrowserEvent('show-form');
    }

    public function render()
    {
        $data = $this->transaksi;
        return view(
            'livewire.transaksi.transaksi',
            [
                'transaksi' => $data,
            ]
        );
    }
}
