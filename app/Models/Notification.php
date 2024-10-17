<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'user_id',
        'is_global',
        'type',
        'url',
        'meta_data',
        'is_read',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function unreadCount()
    {
        $query = self::where('is_read', 0);

        if (__isFranchise())
            $query->where('user_id', Auth::id());

        return $query->count();
    }

    // Scopes
    public function scopeAuthenticated(Builder $query): Builder
    {
        if (__isFranchise())
            return $query->where('user_id', Auth::id());

        return $query;
    }
}
