<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property int $price
 * @property Performer[] $performers
 * @property Reservation[]|\Illuminate\Database\Eloquent\Collection $reservations
 * @property Location $location
 * @property int $location_id
 */
class Event extends Model
{
    use HasFactory;

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function performers(): HasMany
    {
        return $this->hasMany(Performer::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
