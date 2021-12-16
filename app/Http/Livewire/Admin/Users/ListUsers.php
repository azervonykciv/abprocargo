<?php

namespace App\Http\Livewire\Admin\Users;


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
        FacadesValidator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validated();

        dd('here');
    }
    
    public function render()
    {
        return view('livewire.admin.users.list-users');
    }
}
