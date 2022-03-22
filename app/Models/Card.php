<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
          'card_uuid',
          'user_id',
      ];

    /**
     * Get the user for the card.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the gyms for the card.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Gym>
     */
    public function visits()
    {
        return $this->belongsToMany(Gym::class);
    }

    /**
     * Get information if the card has been used today
     *
     * @return boolean
     */
    public function isUsedToday()
    {
        return $this->visits()->get()->map(function ($visit) {
            return $visit->created_at->isToday();
        })->contains(true);
    }
}
