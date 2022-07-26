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
        $this->validate($this->rules());
        $this->user->save();
    }

    protected function rules()
    {
        return [
            'user.name' => [
                'required'
            ],
            'user.email' => [
                'required'
            ],
            'user.mobile' => [
                'required'
            ],
            'user.password' => [
                'password'
            ],
            'user.cpassword' => [
                'password'
            ],
        ];
    }
}
