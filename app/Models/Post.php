<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'author',
        'excerpt',
        'content',
        'featured_image',
        'reading_time',
        'is_featured',
        'is_published',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }
    protected static function booted(): void
    {
        static::saved(function (Post $post): void {
            if (! $post->is_featured) {
                return;
            }

            static::query()
                ->whereKeyNot($post->getKey())
                ->where('is_featured', true)
                ->update([
                    'is_featured' => false,
                ]);
        });
    }
    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
