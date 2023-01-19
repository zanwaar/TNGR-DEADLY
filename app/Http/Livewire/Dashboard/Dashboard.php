<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Livewire\AppComponent;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaksi;
use Livewire\Component;

class Dashboard extends AppComponent
{
    public $total_c;
    public $total_p;
    public $total_h;

    public function mount()
    {
        $this->total_c = Customer::all()->count();
        $this->total_p = Product::all()->count();
        $this->total_h = Transaksi::where('status', 'Selesai')->whereBetween('created_at', [now()->today(), now()])->count();
    }
    public function getTransaksiProperty()
    {
        return Transaksi::latest()->with(['user'])->paginate($this->trow);
    }
    public function render()
    {
        $data = $this->transaksi;
        return view('livewire.dashboard.dashboard', [
            'transaksi' => $data,
        ]);
    }
}
