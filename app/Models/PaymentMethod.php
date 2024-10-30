<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'logo_url',
        'description',
        'meta_info',
        'is_default'
    ];

    public function getMetaInfoAttribute($value)
    {
        return json_decode($value); // Decode to an object
    }
}
