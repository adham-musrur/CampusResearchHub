<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchUpdate extends Model
{
    use HasFactory;


    protected $fillable = [

        'title',

        'description',

        'image',

        'published_by',

    ];



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    // User who published the update
    public function publisher()
    {
        return $this->belongsTo(
            User::class,
            'published_by'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | Security Helper
    |--------------------------------------------------------------------------
    */


    public function belongsToUser($userId): bool
    {
        return $this->published_by === $userId;
    }

}