<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
    protected $fillable = [
        'title',
        'description',
        'department',
        'research_area',
        'deadline',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}