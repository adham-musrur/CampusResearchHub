<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    protected $fillable = [
        'project_id',
        'dataset_name',
        'description',
        'file_path',
        'file_type',
        'uploaded_by',
    ];

    public function project()
    {
        return $this->belongsTo(ResearchProject::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}