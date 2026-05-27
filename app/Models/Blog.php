<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'short_description', 'content',
        'image', 'category_id', 'published_at', 'is_published'
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Blog $blog) {
            if (empty($blog->slug)) {
                $blog->slug = self::generateUniqueSlug($blog->title);
            }
        });

        static::updating(function (Blog $blog) {
            if ($blog->isDirty('title') && empty($blog->getOriginal('slug'))) {
                $blog->slug = self::generateUniqueSlug($blog->title);
            }
        });
    }

    private static function generateUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $count = static::where('slug', 'like', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    // Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Scopes
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeByCategory(Builder $query, ?string $category): Builder
    {
        if ($category && $category !== 'all') {
            $query->whereHas('category', fn($q) => $q->where('slug', $category));
        }
        return $query;
    }

    public function scopeByDate(Builder $query, ?string $date): Builder
    {
        if ($date) {
            $query->whereYear('published_at', substr($date, 0, 4))
                  ->whereMonth('published_at', substr($date, 5, 2));
        }
        return $query;
    }

    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }
        return $query;
    }

    // Helpers
    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        return asset('images/default-blog.jpg');
    }

    public function getReadTimeAttribute(): string
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200);
        return $minutes . ' min read';
    }
}
