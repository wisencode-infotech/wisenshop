<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'category_id',
        'status',
    ];

    // Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function displayImage(): HasOne
    {
        return $this->hasOne(ProductImage::class);
    }

    public function variations()
{
    return $this->hasMany(ProductVariation::class);
}

    // Accessors
    public function getDisplayImageURLAttribute()
    {
        $display_image = $this->displayImage;
        
        return (!empty($display_image)) ? $display_image->image_url : ProductImage::$placeholder_url;
    }

    public function getDiscountedPriceAttribute() 
    {
        if (!empty($this->discount_type) && !empty($this->discount_value)) {
            if($this->discount_type == 'percentage') {
                $discounted_amount = ($this->price * $this->discount_value) / 100;
                $product_origin_price = $this->price - $discounted_amount;
            } else {
                $product_origin_price = $this->price - $this->discount_value;
            }
            return number_format($product_origin_price, 2);
        }
        return $this->price;
    }

    public function getTotalReviewsAttribute()
    {
        return $this->reviews()->select('id')->count();
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
}
