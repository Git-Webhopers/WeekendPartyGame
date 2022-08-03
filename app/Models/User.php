<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'mobile', 'password', 'avatar', 'bio', 'role', 'last_seen_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['status', 'last_seen'];


    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public function getStatusAttribute()
    {
        return Cache::has('user-is-online-' . $this->id) ? 'Online' : 'Offline';
    }

    public function getLastSeenAttribute()
    {
        return Carbon::parse($this->last_seen_at)->diffForHumans();
    }

    public function playersFlippedMe($game_id)
    {
        $playerIds = GameUser::where('game_id', $game_id)->where('flipped_id', $this->id)->pluck('user_id')->toArray();
        return User::whereIn('id', $playerIds)->get();
    }
}
