<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

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
            return Storage::url($this->image_path); // Return the URL of the stored image
        }

        // If image_path is not set or file does not exist, return the placeholder URL
        return self::$placeholder_url; // Ensure to use self:: for static property access
    }
}
