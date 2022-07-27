<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $flipped = 0;
    public $users;
    public $cards;
    public $game;

    public function mount()
    {
        $this->game = Game::whereIn('status', ['To Be Started', 'Being Played'])->latest()->first();
        if ($this->game) {
            $this->users = $this->game->users()->where('role', 'Player')->get();
            $pivot =  DB::table('game_user')->where('game_id', $this->game->id)->where('user_id', auth()->user()->id)->first();
            $this->flipped = $pivot ? $pivot->flipped_id : 0;
            $this->cards = $this->users->shuffle()->all();
        }
        // dd($this->users);
    }

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function mixCards()
    {
        $this->cards = $this->users->shuffle()->all();
    }

    public function flip($id)
    {
        if ($this->flipped == 0) {
            $this->flipped = $id;
            DB::table('game_user')->where('game_id', $this->game->id)->where('user_id', auth()->user()->id)->update(['flipped_id' => $id]);
        }
    }

    public function createGame()
    {
        Game::create();
    }

    public function addMe()
    {
        if ($this->game)
            if (!$this->game->users()->where('user_id', auth()->user()->id)->exists())
                $this->game->users()->attach(auth()->user()->id);
    }
}
