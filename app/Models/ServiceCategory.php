<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'label',
        'title',
        'subtitle',
        'icon',
        'banner_image',
        'banner_alt',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function plans(): HasMany
    {
        return $this->hasMany(ServicePlan::class, 'category_id')->orderBy('sort_order');
    }

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'category_id')->orderBy('sort_order');
    }

    public function addons(): HasMany
    {
        return $this->hasMany(Addon::class, 'category_id')->orderBy('sort_order');
    }
}
