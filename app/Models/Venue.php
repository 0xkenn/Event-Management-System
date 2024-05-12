<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'name'
    ];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
