<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AllItem extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'item_name',
        'amount',
        'status',
        'place',
        'description',
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
