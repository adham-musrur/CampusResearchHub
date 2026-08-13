<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'project_id',
        'user_id',
        'message',
    ];

    public function project()
    {
        return $this->belongsTo(ResearchProject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}