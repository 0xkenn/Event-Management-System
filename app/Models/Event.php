<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'image',
        'start_time',
        'end_time',
        'description',
        'university_id',
        'venue_id',
    ];

    // protected $casts = [
    //     'start_time' => 'date:m/d/Y',
    // ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    public function savedEvents(): HasMany
    {
        return $this->hasMany(Saved_event::class);
    }
}
