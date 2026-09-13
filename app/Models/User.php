<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{

    use HasFactory, Notifiable;


    protected $fillable = [

        'name',

        'email',

        'password',

        'role',

        'department',

        'student_id',

    ];



    protected $hidden = [

        'password',

        'remember_token',

    ];



    protected function casts(): array
    {

        return [

            'email_verified_at' => 'datetime',

            'password' => 'hashed',

        ];

    }



    /*
    |--------------------------------------------------------------------------
    | Role Helper
    |--------------------------------------------------------------------------
    */


    public function hasRole($role): bool
    {

        return strtolower($this->role) === strtolower($role);

    }



    public function hasAnyRole(array $roles): bool
    {

        return in_array(
            strtolower($this->role),
            array_map('strtolower', $roles)
        );

    }



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    // User created research projects
    public function researchProjects()
    {

        return $this->hasMany(
            ResearchProject::class
        );

    }



    // Project memberships
    public function projectMemberships()
    {

        return $this->hasMany(
            ProjectMember::class
        );

    }



    // Uploaded research papers
    public function researchPapers()
    {

        return $this->hasMany(
            ResearchPaper::class,
            'author_id'
        );

    }



    // Uploaded datasets
    public function datasets()
    {

        return $this->hasMany(
            Dataset::class,
            'uploaded_by'
        );

    }



    // Published research updates
    public function researchUpdates()
    {

        return $this->hasMany(
            ResearchUpdate::class,
            'published_by'
        );

    }



    // Discussions
    public function discussions()
    {

        return $this->hasMany(
            Discussion::class
        );

    }

}