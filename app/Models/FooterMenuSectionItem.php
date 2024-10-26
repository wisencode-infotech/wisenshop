<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMenuSectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'slug',
        'is_external',
        'is_system_built',
        'footer_menu_section_id',
        'content',
        'status',
    ];
}
