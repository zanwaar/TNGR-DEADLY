<?php

namespace App\Http\Livewire\Customer;

use App\Http\Livewire\AppComponent;
use App\Models\User;
use Livewire\Component;

class ListCustomer extends AppComponent
{
    public function getCustomerProperty()
    {
        return User::role('user')->with(['customer'])
            ->where(function ($query) {
                $query->whereRelation('customer', 'nohp', 'like', '%' . $this->searchTerm . '%');
                $query->whereRelation('customer', 'alamat', 'like', '%' . $this->searchTerm . '%');
                $query->orwhere('name', 'like', '%' . $this->searchTerm . '%');
                $query->orwhere('email', 'like', '%' . $this->searchTerm . '%');
            })

            ->paginate($this->trow);
    }

    public function render()
    {
        $data = $this->customer;
        return view('livewire.customer.list-customer', ['customer' => $data]);
    }
}
