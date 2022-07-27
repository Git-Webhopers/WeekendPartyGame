<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $flipped = false;
    public $users;
    public $cards;

    public function mount(){
        $this->users = User::where('role', 'Player')->get();
        $this->cards = $this->users->shuffle()->all();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function mixCards()
    {
        $this->cards = $this->users->shuffle()->all();
        dd('ok');
    }

    public function flip()
    {
        $this->flipped = !$this->flipped;
    }
}
