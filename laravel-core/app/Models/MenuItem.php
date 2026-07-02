<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'name', 'category', 'description', 'price',
        'emoji', 'badge', 'badge_type', 'tags',
        'is_available', 'is_featured', 'sort_order',
    ];

    protected $casts = [
        'tags'         => 'array',
        'is_available' => 'boolean',
        'is_featured'  => 'boolean',
        'price'        => 'decimal:2',
    ];

    /**
     * Search by name or category keyword.
     */
    public static function search(string $query)
    {
        $q = trim(strtolower($query));

        return static::where('is_available', true)
            ->where(function ($builder) use ($q) {
                $builder->whereRaw('LOWER(name) LIKE ?', ["%{$q}%"])
                        ->orWhereRaw('LOWER(category) LIKE ?', ["%{$q}%"])
                        ->orWhereRaw('LOWER(description) LIKE ?', ["%{$q}%"]);
            })
            ->orderBy('sort_order')
            ->get();
    }
}
