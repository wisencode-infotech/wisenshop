<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel will assume 'inquiries' by default)
    protected $table = 'inquiry';

    // Specify the columns that are mass assignable
    protected $fillable = ['data'];

    // Disable updated_at since you're only using created_at
    public $timestamps = true;

    // Disable the updated_at column
    const UPDATED_AT = null;
}
