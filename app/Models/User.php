<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the cards for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Card>
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    /**
     * Get information if user has used any card to visit gym today
     *
     * @return boolean
     */
    public function hasUsedCardToday()
    {
        return $this->cards()->get()->map(function ($card) {
            return $card->isUsedToday();
        })->contains(true);
    }
}
