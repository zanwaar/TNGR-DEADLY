<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $image;

    public $state = [];

    public function mount()
    {
        $this->state = auth()->user()->only(['name', 'email']);
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image', // 1MB Max
        ]);

        $previousPath = auth()->user()->avatar;
        $path = $this->image->store('/', 'avatars');
        auth()->user()->update(['avatar' => $path]);
        Storage::disk('avatars')->delete($previousPath);
        $this->dispatchBrowserEvent('alert', ['message' => 'Profile changed successfully!']);
    }

    public function updateProfile(UpdatesUserProfileInformation $updater)
    {
        $updater->update(auth()->user(), [
            'name' => $this->state['name'],
            'email' => $this->state['email']
        ]);

        $this->emit('nameChanged', auth()->user()->name);
        $this->dispatchBrowserEvent('alert', ['message' => 'Profile updated successfully!']);
    }

    public function changePassword(UpdatesUserPasswords $updater)
    {
        $updater->update(
            auth()->user(),
            $attributes = Arr::only($this->state, ['current_password', 'password', 'password_confirmation'])
        );

        collect($attributes)->map(fn ($value, $key) => $this->state[$key] = '');
        $this->dispatchBrowserEvent('alert', ['message' => 'Password changed successfully!']);
    }
    public function render()
    {
        return view('livewire.profile.profile');
    }
}
