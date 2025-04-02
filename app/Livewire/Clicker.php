<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;

    #[Validate('required|min:2|max:50')]
    public $name;

    #[Validate('required|email|unique:users')]
    public $email;

    #[Validate('required|min:6|max:15')]
    public $password;

    public function render()
    {
        $users = User::paginate(5);

        return view('livewire.clicker',[
            'users' => $users
        ]);
    }

    public function createUser() {

        // First method
        // $validated = $this->validate([
        //     'name' => 'required|min:2|max:50',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:6'
        // ]);

        $validated = $this->validate();
        User::create($validated);

        $this->reset();

        request()->session()->flash('success', "User Created Successfully!");
    }
}
