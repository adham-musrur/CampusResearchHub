<?php

namespace App\Http\Controllers;

use App\Models\ResearchProject;
use App\Models\ResearchPaper;
use App\Models\Dataset;
use App\Models\ResearchUpdate;
use App\Models\Discussion;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | STUDENT DASHBOARD
        |--------------------------------------------------------------------------
        */
if ($user->role === 'student') {

    /*
    |--------------------------------------------------------------------------
    | Student Specific Data
    |--------------------------------------------------------------------------
    */

    $studentProjects = ResearchProject::where('user_id', $user->id)
        ->latest()
        ->get();


    $studentPapers = ResearchPaper::where('author_id', $user->id)
        ->with('author')
        ->latest()
        ->get();


    $studentDatasets = Dataset::where('uploaded_by', $user->id)
        ->latest()
        ->get();


    $recentUpdates = ResearchUpdate::latest()
        ->take(5)
        ->get();



    $stats = [

        'projects' => $studentProjects->count(),

        'papers' => $studentPapers->count(),

        'datasets' => $studentDatasets->count(),

        'updates' => ResearchUpdate::count(),

        'discussions' => Discussion::count(),

    ];



    $recentProjects = $studentProjects->take(5);


    $recentPapers = $studentPapers->take(5);



    return view('dashboard.student', compact(

        'stats',

        'recentProjects',

        'recentPapers',

        'recentUpdates'

    ));

}


        /*
        |--------------------------------------------------------------------------
        | OTHER DASHBOARDS
        |--------------------------------------------------------------------------
        */

        $stats = [
            'projects' => ResearchProject::count(),
            'papers' => ResearchPaper::count(),
            'datasets' => Dataset::count(),
            'updates' => ResearchUpdate::count(),
            'discussions' => Discussion::count(),
        ];

        $recentProjects = ResearchProject::latest()
            ->take(5)
            ->get();

        $recentPapers = ResearchPaper::with('author')
            ->latest()
            ->take(5)
            ->get();

        $recentUpdates = ResearchUpdate::latest()
            ->take(5)
            ->get();


        if ($user->role === 'faculty') {

            return view('dashboard.faculty', compact(
                'stats',
                'recentProjects',
                'recentPapers',
                'recentUpdates'
            ));
        }


        if ($user->role === 'supervisor') {

            return view('dashboard.supervisor', compact(
                'stats',
                'recentProjects',
                'recentPapers',
                'recentUpdates'
            ));
        }


        if ($user->role === 'admin') {

            return view('dashboard.admin', compact(
                'stats',
                'recentProjects',
                'recentPapers',
                'recentUpdates'
            ));
        }


        abort(403);
    }
}