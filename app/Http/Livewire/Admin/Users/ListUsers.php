<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Livewire\Component;

class ListUsers extends Component
{
    public $state = [];

    public function addNew()
    {
        $this->dispatchBrowserEvent('show-form');
    }
    
    public function createUser()
    {
        $validatedDate = FacadesValidator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validated();

        $validatedDate['password'] = bcrypt($validatedDate['password']);

        User::create($validatedDate);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added succesfully!']);



        return redirect()->back();
    }

    public function edit(User $user)
    {
        dd($user);
    }
    
    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users', [
            'users' => $users,
        ]);
    }
}
