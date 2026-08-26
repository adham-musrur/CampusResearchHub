<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchProject;
use App\Models\ResearchPaper;
use App\Models\Dataset;
use App\Models\ResearchUpdate;

class ResearchSearchController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->search;


        $projects = collect();
        $papers = collect();
        $datasets = collect();
        $updates = collect();



        if($search)
        {

            $projects = ResearchProject::where('title','like','%'.$search.'%')
                ->orWhere('description','like','%'.$search.'%')
                ->orWhere('research_area','like','%'.$search.'%')
                ->latest()
                ->get();



            $papers = ResearchPaper::with('author')
                ->where('title','like','%'.$search.'%')
                ->orWhere('abstract','like','%'.$search.'%')
                ->orWhere('category','like','%'.$search.'%')
                ->latest()
                ->get();



            $datasets = Dataset::with('uploader')
                ->where('dataset_name','like','%'.$search.'%')
                ->orWhere('description','like','%'.$search.'%')
                ->latest()
                ->get();



            $updates = ResearchUpdate::with('publisher')
                ->where('title','like','%'.$search.'%')
                ->orWhere('description','like','%'.$search.'%')
                ->latest()
                ->get();

        }



        return view('research.search', compact(
            'search',
            'projects',
            'papers',
            'datasets',
            'updates'
        ));

    }

}