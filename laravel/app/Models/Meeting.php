<?php

namespace App\Models;

use App\Filters\MeetingFilter;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Meeting extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'meeting_time',
        'description',
        'tag_id',
        'participants_need',
        'participants_have',
        'diff',
        'coordinates'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    public function tags()
    {
        return $this->belongsToMany(Tags::class,
            'meet_tags',
            'meet_id',
            'tag_id');

    }

    public function get_meetings(){
        $pins = $this->get();
    }
}
