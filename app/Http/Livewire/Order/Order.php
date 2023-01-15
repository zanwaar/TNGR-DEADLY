<?php

namespace App\Http\Livewire\Order;

use App\Exports\Laporan;
use App\Http\Livewire\AppComponent;
use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;


class Order extends AppComponent
{
    public $ts;
    public $total;
    public $list;
    public $listcount;
    public $state = [];
    public function getTransaksiProperty()
    {
        return Transaksi::latest()->with(['user'])->where(function ($query) {
            $query->whereRelation('user', 'email', 'like', '%' . $this->searchTerm . '%');
            $query->whereRelation('user', 'name', 'like', '%' . $this->searchTerm . '%');
            $query->orwhere('invoice', 'like', '%' . $this->searchTerm . '%');
            $query->orwhere('total', 'like', '%' . $this->searchTerm . '%');
            $query->orwhere('created_at', 'like', '%' . $this->searchTerm . '%');
            $query->orwhere('status', 'like', '%' . $this->searchTerm . '%');
        })

            ->paginate($this->trow);
    }

    public function fexcel()
    {
        try {
            return Excel::download(new Laporan, 'users.xlsx');
        } catch (\Throwable $th) {
            // throw $th;
            $this->dispatchBrowserEvent('alert-danger', ['message' => 'Gagal']);
        }
    }
    public function detail($id)
    {
        $this->reset();
        $ts =  Transaksi::where('id', $id)->first();
        $this->ts = $ts;
        $list = Cart::where('transaksi_id', $id)->with(['product'])->get();
        $this->list = $list;
        $this->listcount = $list->count();
        $this->dispatchBrowserEvent('show-form');
    }
    public function ubahstatus($id)
    {
        $this->reset();
        $ts =  Transaksi::where('id', $id)->first();
        $this->ts = $ts;
        $this->dispatchBrowserEvent('show-status');
    }
    public function updatestatus()
    {

        $validatedData = Validator::make($this->state, [
            'status' => 'required',
        ])->validate();
        $this->ts->update($validatedData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'updated successfully!']);
        $this->reset();
    }
    public function render()
    {
        $data = $this->transaksi;
        return view('livewire.order.order', [
            'transaksi' => $data,
        ]);
    }
}
