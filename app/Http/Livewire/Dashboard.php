<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $flipped = false;

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function flip()
    {
        $this->flipped = !$this->flipped;
    }
}
