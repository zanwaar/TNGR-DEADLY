<?php

namespace App\Http\Livewire\Product;

use App\Http\Livewire\AppComponent;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class AdminListProduct extends AppComponent
{
    public $state = [];
    public function create()
    {
        $validatedData = Validator::make($this->state, [
            'kategori_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ])->validate();
        Product::create([
            'nama' => $this->state['nama'],
            'kategori_id' => $this->state['kategori_id'],
            'deskripsi' => $this->state['deskripsi'],
            'harga' => $this->state['harga'],
            'foto' => $this->state['foto'],
        ]);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'added successfully!']);
    }
    public function getProductProperty()
    {
        return Product::latest()
            ->paginate($this->trow);
    }
    public function render()
    {
        $data = $this->product;
        return view('livewire.product.admin-list-product', [
            'product' => $data,
        ]);
    }
}
