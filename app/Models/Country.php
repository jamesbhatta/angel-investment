<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function imageUrl()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/no-image.png');
    }

    public function coverImageUrl()
    {
        return $this->cover_image ? asset('storage' . $this->cover_image) : asset('img/banner.jpg');
    }

    public function scopeActive($query, $status = true)
    {
        return $query->where('active', $status);
    }

    public function pitches()
    {
        return $this->hasMany(Pitch::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
