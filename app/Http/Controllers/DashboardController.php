<?php

namespace App\Http\Controllers;

use App\Models\ResearchProject;
use App\Models\ResearchPaper;
use App\Models\Dataset;
use App\Models\ResearchUpdate;
use App\Models\Discussion;
use App\Models\ProjectMember;


class DashboardController extends Controller
{

    public function index()
    {

        $user = auth()->user();

        $role = strtolower($user->role);



        if ($role === 'student') {


            $studentProjects = ResearchProject::where('user_id', $user->id)
                ->latest()
                ->get();


            $memberProjects = ProjectMember::where('user_id', $user->id)
                ->with('project')
                ->latest()
                ->get();


            $studentPapers = ResearchPaper::where('author_id', $user->id)
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

                'team_projects' => $memberProjects->count(),

                'papers' => $studentPapers->count(),

                'datasets' => $studentDatasets->count(),

            ];



            return view('dashboard.student', compact(
                'stats',
                'studentProjects',
                'memberProjects',
                'studentPapers',
                'studentDatasets',
                'recentUpdates'
            ));

        }



        if ($role === 'faculty') {


            $facultyProjects = ResearchProject::where('user_id', $user->id)
                ->latest()
                ->get();


            $facultyPapers = ResearchPaper::where('author_id', $user->id)
                ->latest()
                ->get();


            $facultyDatasets = Dataset::where('uploaded_by', $user->id)
                ->latest()
                ->get();



            $stats = [

                'projects' => $facultyProjects->count(),

                'papers' => $facultyPapers->count(),

                'datasets' => $facultyDatasets->count(),

            ];



            return view('dashboard.faculty', compact(
                'stats',
                'facultyProjects',
                'facultyPapers',
                'facultyDatasets'
            ));

        }



        if ($role === 'supervisor') {


            $supervisedProjects = ProjectMember::where('user_id', $user->id)
                ->where('member_role', 'Supervisor')
                ->with('project')
                ->get();



            $stats = [

                'projects' => $supervisedProjects->count(),

                'members' => ProjectMember::count(),

                'updates' => ResearchUpdate::count(),

            ];



            return view('dashboard.supervisor', compact(
                'stats',
                'supervisedProjects'
            ));

        }



        if ($role === 'admin') {


            $stats = [

                'projects' => ResearchProject::count(),

                'papers' => ResearchPaper::count(),

                'datasets' => Dataset::count(),

                'updates' => ResearchUpdate::count(),

                'discussions' => Discussion::count(),

            ];



            return view('dashboard.admin', compact('stats'));

        }



        abort(403);

    }

}