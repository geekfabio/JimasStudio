<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PortfolioItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client',
        'description',
        'cover_image',
        'gallery_images',
        'category',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'gallery_images' => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $item) {
            if (empty($item->slug)) {
                $item->slug = Str::slug($item->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
