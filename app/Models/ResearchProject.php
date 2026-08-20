<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'department',
        'research_area',
        'deadline',
        'status',
        'user_id',
    ];


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    // Project owner / creator
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Project members
    public function members()
    {
        return $this->hasMany(ProjectMember::class, 'project_id');
    }

}