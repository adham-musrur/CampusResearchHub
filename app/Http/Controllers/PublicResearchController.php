<?php

namespace App\Http\Controllers;

use App\Models\ResearchPaper;
use App\Models\Dataset;
use App\Models\ResearchUpdate;

class PublicResearchController extends Controller
{

    public function index()
    {

        $papers = ResearchPaper::with('author')
            ->latest()
            ->take(10)
            ->get();



        $datasets = Dataset::with('uploader')
            ->latest()
            ->take(10)
            ->get();



        $updates = ResearchUpdate::with('publisher')
            ->latest()
            ->take(10)
            ->get();



        return view('research.index', compact(
            'papers',
            'datasets',
            'updates'
        ));

    }

}