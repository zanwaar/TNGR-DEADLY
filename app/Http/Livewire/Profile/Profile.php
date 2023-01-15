<?php

namespace App\Http\Livewire\Profile;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Profile extends Component
{
    public $state = [];
    public $mcs;

    public function mount()
    {
        $this->mcs = Customer::where('user_id', Auth::user()->id)->first();
        if ($this->mcs !== null) {
            $this->state =  $this->mcs->toArray();
        }
    }

    public function update()
    {
        $cs = Customer::where('user_id', Auth::user()->id)->first();

        if ($cs === null) {
            $validatedData = Validator::make($this->state, [
                'nohp' => 'required',
                'alamat' => 'required',
            ])->validate();
            $validatedData['user_id'] = Auth::user()->id;
            Customer::create($validatedData);
            $this->dispatchBrowserEvent('hide-form', ['message' => 'added successfully!']);
        } else {
            $validatedData = Validator::make($this->state, [
                'nohp' => 'required',
                'alamat' => 'required',
            ])->validate();
            $cs->update($validatedData);

            $this->dispatchBrowserEvent('hide-form', ['message' => 'updated successfully!']);
        }
    }

    public function render()
    {
        return view('livewire.profile.profile');
    }
}
