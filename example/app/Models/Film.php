<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'title',
        'description',
        'genre',
        'producer',
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }

    public function setGenreAttribute($value)
    {
        $this->attributes['genre'] = ucwords($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected static function booted()
    {
        static::creating(function ($film) {
            if (!Auth::check())
                abort(401, "Authentication required");
            $film->user_id = Auth::id();
        });

        static::updating(function ($film) {
            if (!Auth::check())
                abort(401, "Authentication required");
            if (Auth::id() != $film->user_id && !Auth::user()->is_admin)
                abort(403, "Unauthorized");
        });

        static::deleting(function ($film) {
            if (!Auth::check())
                abort(401, "Authentication required");
            if (Auth::id() != $film->user_id && !Auth::user()->is_admin)
                abort(403, "Unauthorized");
        });
    }
}

