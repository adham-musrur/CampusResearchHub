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

        if ($user->role === 'student') {
            return view('dashboard.student', compact(
                'stats',
                'recentProjects',
                'recentPapers',
                'recentUpdates'
            ));
        }

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