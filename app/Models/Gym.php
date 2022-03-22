<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
          'name',
          'address',
      ];

    /**
     * Get the cards for the gym.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Card>
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
