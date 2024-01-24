<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'email',
        'location',
        'website',
        'tags',
        'description',
        'logo',
        'user_id'
    ];

    public function scopeFilter(Builder $builder, array $filters): void
    {
        // Filter for tags
        if ($filters['tag'] ?? false) {
            $builder->where('tags', 'LIKE', '%' . request('tag') . '%');
        }

        // Filter for search form
        if ($filters['search'] ?? false) {
            $builder->where('title', 'LIKE', '%' . request('search') . '%')
                ->orWhere('description', 'LIKE', '%' . request('search') . '%')
                ->orWhere('tags', 'LIKE', '%' . request('search') . '%');
        }
    }

    /**
     * Method to create relationship to user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
