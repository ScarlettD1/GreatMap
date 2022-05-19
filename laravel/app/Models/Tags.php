<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class tags extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tag',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class,
            'meet_tags',
            'tag_id',
            'meet_id');

    }
    //return $this->belongsToMany(RelatedModel,
    // pivot_table_name,
    // foreign_key_of_current_model_in_pivot_table,
    // foreign_key_of_other_model_in_pivot_table);
}
