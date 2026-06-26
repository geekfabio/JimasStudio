<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'text',
        'sort_order',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(ServicePlan::class, 'plan_id');
    }
}
