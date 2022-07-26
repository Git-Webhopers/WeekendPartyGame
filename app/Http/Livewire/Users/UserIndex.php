<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public $users;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.user-index');
    }

    public function delete($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
    }
}
