<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FooterMenuSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function menuItems(): HasMany
    {
        return $this->hasMany(FooterMenuSectionItem::class);
    }
}
