<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailTemplate extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email_template_category_id',
        'subject',
        'body_html',
        'body_text',
        'placeholders',
        'locale',
        'is_active'
    ];

    // Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(EmailTemplateCategory::class);
    }
}
