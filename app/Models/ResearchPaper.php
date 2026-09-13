<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchPaper extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'abstract',
        'paper_file',
        'publication_date',
        'category',
        'author_id',
    ];



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    // Paper uploader
    public function author()
    {
        return $this->belongsTo(
            User::class,
            'author_id'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | Security Helper
    |--------------------------------------------------------------------------
    */


    public function belongsToUser($userId): bool
    {
        return $this->author_id === $userId;
    }

}