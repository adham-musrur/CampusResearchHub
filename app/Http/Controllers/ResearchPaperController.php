<?php

namespace App\Http\Controllers;

use App\Models\ResearchPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchPaperController extends Controller
{

    /**
     * Display all research papers with search and filtering.
     */
    public function index(Request $request)
    {

        $search = $request->search;
        $category = $request->category;


        $papers = ResearchPaper::with('author')

            ->when($search, function ($query, $search) {

                $query->where(function ($q) use ($search) {

                    $q->where('title', 'like', '%' . $search . '%')
                        ->orWhere(
                            'abstract',
                            'like',
                            '%' . $search . '%'
                        );

                });

            })


            ->when($category, function ($query, $category) {

                $query->where('category', $category);

            })


            ->latest()
            ->paginate(10)
            ->withQueryString();



        $categories = ResearchPaper::select('category')
            ->distinct()
            ->pluck('category');



        return view('papers.index', compact(
            'papers',
            'categories',
            'search',
            'category'
        ));

    }


    /**
     * Show upload form.
     */
    public function create()
    {
        $this->authorize('create', ResearchPaper::class);

        return view('papers.create');
    }


    /**
     * Store a new research paper.
     */
    public function store(Request $request)
    {
        $this->authorize('create', ResearchPaper::class);


        $request->validate([
            'title' => 'required|string|max:255',
            'abstract' => 'required|string',
            'paper_file' => 'required|file|mimes:pdf|max:10240',
            'publication_date' => 'nullable|date',
            'category' => 'required|string|max:255',
        ]);


        $filePath = $request->file('paper_file')
            ->store('research-papers', 'public');


        ResearchPaper::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'paper_file' => $filePath,
            'publication_date' => $request->publication_date,
            'category' => $request->category,
            'author_id' => auth()->id(),
        ]);


        return redirect()
            ->route('papers.index')
            ->with('success', 'Research paper uploaded successfully!');

    }


    /**
     * Display one research paper.
     */
    public function show(ResearchPaper $paper)
    {
        $paper->load('author');

        return view('papers.show', compact('paper'));
    }


    /**
     * Download paper PDF.
     */
    public function download(ResearchPaper $paper)
    {
        if (!Storage::disk('public')->exists($paper->paper_file)) {

            abort(404, 'Paper file not found.');

        }


        return Storage::disk('public')->download(
            $paper->paper_file,
            $paper->title . '.pdf'
        );
    }


    /**
     * Delete research paper.
     */
    public function destroy(ResearchPaper $paper)
    {

        $this->authorize('delete', $paper);


        if (Storage::disk('public')->exists($paper->paper_file)) {

            Storage::disk('public')->delete($paper->paper_file);

        }


        $paper->delete();


        return redirect()
            ->route('papers.index')
            ->with('success', 'Research paper deleted successfully!');

    }

}