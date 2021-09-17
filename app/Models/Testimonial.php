<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    const CACHE_KEY = 'positioned-testimonials';

    protected $guarded = [];


    public function scopePositioned($query)
    {
        return $query->orderBy('position');
    }

    public function clientPhotoUrl()
    {
        return $this->client_photo
            ? asset('storage/' . $this->client_photo)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->client_name) . '&color=fff&background=4f46e5';
    }

    // Cache not yet implemented
    public static function clearCache()
    {
        Cache::forget(self::CACHE_KEY);
    }

    public static function getNextPosition()
    {
        return Testimonial::max('position') + 1;
    }
}
