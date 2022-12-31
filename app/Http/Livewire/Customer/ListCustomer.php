<?php

namespace App\Http\Livewire\Customer;

use App\Http\Livewire\AppComponent;
use App\Models\User;
use Livewire\Component;

class ListCustomer extends AppComponent
{
    public function getCustomerProperty()
    {
        return User::role('user')->with(['list'])
            ->paginate($this->trow);
    }
    public function render()
    {
        $data = $this->customer;
        return view('livewire.customer.list-customer', ['customer' => $data]);
    }
}
