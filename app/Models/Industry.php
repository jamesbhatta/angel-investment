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

    public function imageUrl()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/no-image.png');
    }

    public function coverImageUrl()
    {
        return $this->cover_image ? asset('storage/' . $this->cover_image) : asset('img/banner.jpg');
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
