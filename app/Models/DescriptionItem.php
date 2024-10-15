<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DescriptionItem extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'item_name',
        'amount',
        'status',
        'date',
        'source_of_found',
        'user_id',
    ];

    public static function boot(): void
    {
        parent::boot();
        static::creating(fn($model) => empty($model->id) ? $model->id = rand(1000, 10000) : '');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
