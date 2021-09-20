<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamDepartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopePositioned($query)
    {
        return $query->orderByRaw('ISNULL(position), position ASC');
    }

    public static function getNextPosition()
    {
        return TeamDepartment::max('position') + 1;
    }

    public function canBeDeletedSafely()
    {
        return $this->teams()->count() ? false : true;
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
