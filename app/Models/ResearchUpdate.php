<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchUpdate extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'published_by',
    ];

    public function publisher()
    {
        return $this->belongsTo(User::class, 'published_by');
    }
}