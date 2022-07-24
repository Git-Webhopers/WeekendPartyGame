<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserEdit extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.users.user-edit')->extends('layouts.app');
    }

    public function update()
    {
        $this->user->save();
        dd(['User Updated', $this->user]);
    }
}
