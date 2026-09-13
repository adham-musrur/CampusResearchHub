<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;


    protected $fillable = [

        'project_id',

        'user_id',

        'message',

    ];



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    // Discussion belongs to project
    public function project()
    {
        return $this->belongsTo(
            ResearchProject::class
        );
    }



    // User who created discussion
    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }



    /*
    |--------------------------------------------------------------------------
    | Security Helper
    |--------------------------------------------------------------------------
    */


    public function belongsToUser($userId): bool
    {
        return $this->user_id === $userId;
    }

}