<?php

namespace App\Http\Livewire\Product;

use App\Http\Livewire\AppComponent;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

class AdminListProduct extends AppComponent
{
    use WithFileUploads;
    public $state = [];
    public $mproduct;
    public $showEditModal = false;
    public $idBeingRemoved = null;
    public $photo;
    public $deletefoto;


    public function addNew()
    {
        $this->reset();

        $this->showEditModal = false;

        $this->dispatchBrowserEvent('show-form');
    }
    public function create()
    {
        $validatedData =  Validator::make($this->state, [
            'kategori_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ])->validate();
        if ($this->photo) {
            $validatedData['foto'] = $this->photo->store('/', 'products');
        }

        Product::create($validatedData);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'added successfully!']);
    }

    public function edit(Product $product)
    {
        // dd($ktg);
        $this->reset();
        $this->showEditModal = true;

        $this->mproduct = $product;


        $this->state = $product->toArray();

        $this->dispatchBrowserEvent('show-form');
    }
    public function update()
    {
        $validatedData = Validator::make($this->state, [
            'kategori_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ])->validate();
        if ($this->photo) {
            Storage::disk('products')->delete($this->mproduct->foto);
            $validatedData['foto'] = $this->photo->store('/', 'products');
        }
        $this->mproduct->update($validatedData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully!']);
        $this->reset();
    }

    public function confirmRemoval($id)
    {
        $this->idBeingRemoved = $id['id'];
        $this->deletefoto = $id['foto'];

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function delete()
    {
        $user = Product::findOrFail($this->idBeingRemoved);
        Storage::disk('products')->delete($this->deletefoto);
        $user->delete();

        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User deleted successfully!']);
    }
    public function getProductProperty()
    {
        return Product::latest()->with(['kategori'])
            ->paginate($this->trow);
    }
    public function render()
    {
        $data = $this->product;
        $dataktg = Kategori::all();

        return view('livewire.product.admin-list-product', [
            'product' => $data,
            'kategori' => $dataktg
        ]);
    }
}
