<?php

namespace App\Http\Controllers;

use App\Models\ResearchPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchPaperController extends Controller
{
    /**
     * Display all research papers.
     */
    public function index()
    {
        $papers = ResearchPaper::with('author')
            ->latest()
            ->get();

        return view('papers.index', compact('papers'));
    }

    /**
     * Show upload form.
     */
    public function create()
    {
        return view('papers.create');
    }

    /**
     * Store a new research paper.
     */
    public function store(Request $request)
    {
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
        if (Storage::disk('public')->exists($paper->paper_file)) {
            Storage::disk('public')->delete($paper->paper_file);
        }

        $paper->delete();

        return redirect()
            ->route('papers.index')
            ->with('success', 'Research paper deleted successfully!');
    }
}