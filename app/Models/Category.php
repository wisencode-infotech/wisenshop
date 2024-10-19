<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'parent_id', 'description', 'image_path', 'order'];

    // Define a placeholder URL
    public static $placeholder_url = 'https://placehold.co/158X100/FFF/000';

    // Relationships
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        // Check if image_path is set and the file exists
        if ($this->image_path && Storage::disk('public')->exists($this->image_path)) {
            return Storage::disk('public')->url($this->image_path); // Return the URL of the stored image
        }

        // If image_path is not set or file does not exist, return the placeholder URL
        return self::$placeholder_url; // Ensure to use self:: for static property access
    }

    // scope
    protected static function booted()
    {
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('order', 'asc');
        });
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function scopeMain(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }
}
