<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function markRead()
    {
        return $this->update([
            'read_at' => now()
        ]);
    }

    public function investor()
    {
        return $this->belongsTo(User::class, 'investor_id');
    }

    public function pitch()
    {
        return $this->belongsTo(Pitch::class);
    }
}
