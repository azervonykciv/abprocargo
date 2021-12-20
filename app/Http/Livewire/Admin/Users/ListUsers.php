<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListUsers extends Component
{
    public $state = [];

    public $user;

    public $showEditModal = false;

    public $userIdBeingRemoved = null;

    public function addNew()
    {
        $this->state = [];

        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }
    
    public function createUser()
    {
        $validatedDate = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $validatedDate['password'] = bcrypt($validatedDate['password']);

        User::create($validatedDate);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added succesfully!']);
        return redirect()->back();
    }

    public function edit(User $user)
    {
        $this->showEditModal = true;
        
        $this->user = $user;

        //dd($user->id);

        $this->state = $user->toArray();
         
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser()
    {
        $validatedDate = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed',
        ])->validate();

        if(!empty($validatedDate['password'])) {
            $validatedDate['password'] = bcrypt($validatedDate['password']);
        }

        $this->user->update($validatedDate);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User Updated succesfully!']);
        return redirect()->back();
    }

    public function confirmUserRemoval($userId)
    {
        $this->userIdBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);

        $user->delete();

        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User Deleted Successfully']);

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
