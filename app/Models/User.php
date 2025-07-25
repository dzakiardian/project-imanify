<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function boot(): void
    {
        parent::boot();

        static::creating(fn($model) => empty($model->id) ? $model->id = rand(1000, 10000) : '');
    }

    public function allItem(): HasMany
    {
        return $this->hasMany(AllItem::class, 'user_id', 'id');
    }

    public function descriptionItem(): HasMany
    {
        return $this->hasMany(DescriptionItem::class, 'user_id', 'id');
    }

    public function borrowerItem(): HasMany
    {
        return $this->hasMany(Borrowing::class, 'user_id', 'id');
    }
}
