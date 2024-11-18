<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'symbol',
        'exchange_rate',
        'is_active'
    ];

    protected function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
