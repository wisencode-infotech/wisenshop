<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path'
    ];

    // Define a placeholder URL
    public static $placeholder_url = 'https://placehold.co/445x205';

    // Accessors
    public function getImageUrlAttribute()
    {
        if ($this->image_path && Storage::disk('public')->exists($this->image_path)) {
            return Storage::url($this->image_path); // Return the URL of the stored image
        }

        // Return the placeholder URL if the file does not exist
        return $this->placeholder_url;
    }
}
