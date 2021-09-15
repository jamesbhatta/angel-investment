<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industry extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query, $status = true)
    {
        return $query->where('is_active', $status);
    }

    public function canBeDeletedSafely()
    {
        if ($this->pitches()->count()) {
            return false;
        }
        return true;
    }

    public function pitches()
    {
        return $this->hasMany(Pitch::class);
    }
}
