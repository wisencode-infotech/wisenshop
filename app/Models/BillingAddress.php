<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'shipping_address_id',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    /**
     * Get the user that owns the billing address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullAddressAttribute() {
        $address = $this->address;
        
        if ( !empty($this->city) ) 
            $address .= ' ' . $this->city;

        if ( !empty($this->state) ) 
            $address .= ' ' . $this->state;
        
        if ( !empty($this->postal_code) ) 
            $address .= ' ' . $this->postal_code;

        if ( !empty($this->country) ) 
            $address .= ' ' . $this->country;

        return $address;
    }
}
