<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    public function coverImageUrl()
    {
        return asset('storage' . $this->cover_image);
    }

    public function logoUrl()
    {
        return asset('storage' . $this->logo);
    }

    public function scopeVerified($query, $status = true)
    {
        return $query->where('is_verified', $status);
    }

    public function isVerified()
    {
        return $this->is_verified ? true : false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
