<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteTheme extends Model
{
    protected $fillable = [
        'name',
        'description',
        'identifier'
    ];
}
