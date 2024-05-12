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
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'image',
        'user_id',
        'university_id',
        'venue_id',
    ];

    protected $casts = [
        'start_date' => 'date:m/d/Y',
    ];

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
