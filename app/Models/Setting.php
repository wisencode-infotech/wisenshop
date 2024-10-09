<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'sort_number',
        'setting_group_id'
    ];

    // Relationships
    public function group(): BelongsTo
    {
        return $this->belongsTo(SettingGroup::class, 'setting_group_id');
    }
}
