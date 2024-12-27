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

    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        return cache()->rememberForever("category_{$this->id}_image_url", function () {
            if ($this->image_path && Storage::disk('public')->exists($this->image_path)) {
                return Storage::disk('public')->url($this->image_path);
            }

            return self::$placeholder_url;
        });
    }

    public function getHasChildrenAttribute()
    {
        return cache()->rememberForever("category_{$this->id}_has_children", function () {
            return $this->subcategories()->exists();
        });
    }

    public function getTotalProductsAttribute()
    {
        return cache()->rememberForever("category_{$this->id}_total_products", function () {
            if (!$this->has_children) {
                return $this->products()->count();
            }

            return $this->subcategories->sum(function ($subcategory) {
                return $subcategory->products()->count();
            });
        });
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
