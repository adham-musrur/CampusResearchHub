<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;


    protected $fillable = [

        'project_id',

        'dataset_name',

        'description',

        'file_path',

        'file_type',

        'uploaded_by',

    ];



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    // Dataset belongs to research project
    public function project()
    {
        return $this->belongsTo(
            ResearchProject::class
        );
    }



    // User who uploaded dataset
    public function uploader()
    {
        return $this->belongsTo(
            User::class,
            'uploaded_by'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | Security Helper
    |--------------------------------------------------------------------------
    */


    public function belongsToUser($userId): bool
    {
        return $this->uploaded_by === $userId;
    }

}