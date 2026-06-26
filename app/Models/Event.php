<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'event_date',
        'cover_image',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'event_date' => 'datetime',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('event_date', 'desc');
    }

    public function scopeUpcoming($query)
    {
        return $query->published()->where('event_date', '>=', now())->orderBy('event_date', 'asc');
    }
}
