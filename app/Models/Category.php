<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'color'];

    protected static function booted(): void
    {
        static::creating(function (Category $category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    public function publishedBlogs(): HasMany
    {
        return $this->hasMany(Blog::class)->where('is_published', true);
    }
}
