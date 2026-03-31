<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function team()
    {
        return $this->hasOne(Team::class, 'owner_id');
    }

    public function playerGames()
    {
        return $this->belongsToMany(PlayerGame::class, 'player_game_users');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}