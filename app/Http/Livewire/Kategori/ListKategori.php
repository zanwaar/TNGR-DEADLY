<?php

namespace App\Http\Livewire\Kategori;

use App\Http\Livewire\AppComponent;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListKategori extends AppComponent
{
    public $state = [];
    public $ktg;
    public $showEditModal = false;
    public $idBeingRemoved = null;

    public function create()
    {

        $validatedData = Validator::make($this->state, [
            'kategori' => 'required|unique:kategoris',
        ])->validate();

        Kategori::create($validatedData);

        // session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'added successfully!']);
        $this->reset();
    }

    public function edit(Kategori $ktg)
    {
        // dd($ktg);
        $this->reset();
        $this->showEditModal = true;

        $this->ktg = $ktg;


        $this->state = $ktg->toArray();

        $this->dispatchBrowserEvent('show-form');
    }
    public function update()
    {
        $validatedData = Validator::make($this->state, [
            'kategori' => 'required',
        ])->validate();

        $this->ktg->update($validatedData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'updated successfully!']);
        $this->reset();
    }
    public function confirmRemoval($id)
    {
        $this->idBeingRemoved = $id['id'];

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function delete()
    {
        $user = Kategori::findOrFail($this->idBeingRemoved);

        $user->delete();

        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'deleted successfully!']);
    }
    public function getKategoriProperty()
    {
        return Kategori::latest()
            ->where(function ($query) {
                $query->orwhere('kategori', 'like', '%' . $this->searchTerm . '%');
            })
            ->paginate($this->trow);
    }
    public function render()
    {
        $data = $this->kategori;
        return view('livewire.kategori.list-kategori', ['kategori' => $data]);
    }
}
