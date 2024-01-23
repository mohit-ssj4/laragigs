<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
      'description'
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
}
