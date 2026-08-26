<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\ResearchProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DatasetController extends Controller
{
   /**
 * Display all datasets with search and filtering.
 */
public function index(Request $request)
{

    $search = $request->search;
    $fileType = $request->file_type;



    $datasets = Dataset::with(['project', 'uploader'])


        // Search dataset name and description
        ->when($search, function ($query, $search) {

            $query->where(function ($q) use ($search) {

                $q->where(
                    'dataset_name',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'description',
                    'like',
                    '%' . $search . '%'
                );

            });

        })


        // File type filter
        ->when($fileType, function ($query, $fileType) {

            $query->where('file_type', $fileType);

        })


        ->latest()

        ->paginate(10)

        ->withQueryString();



    $fileTypes = Dataset::select('file_type')
        ->distinct()
        ->pluck('file_type');



    return view('datasets.index', compact(
        'datasets',
        'fileTypes',
        'search',
        'fileType'
    ));

}

    public function create()
    {
        $projects = ResearchProject::latest()->get();

        return view('datasets.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:research_projects,id',
            'dataset_name' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|max:51200',
        ]);

        $file = $request->file('file');

        $filePath = $file->store('datasets', 'public');

        Dataset::create([
            'project_id' => $request->project_id,
            'dataset_name' => $request->dataset_name,
            'description' => $request->description,
            'file_path' => $filePath,
            'file_type' => $file->getClientOriginalExtension(),
            'uploaded_by' => auth()->id(),
        ]);

        return redirect()
            ->route('datasets.index')
            ->with('success', 'Dataset uploaded successfully!');
    }

    public function show(Dataset $dataset)
    {
        $dataset->load(['project', 'uploader']);

        return view('datasets.show', compact('dataset'));
    }

    public function download(Dataset $dataset)
    {
        if (!Storage::disk('public')->exists($dataset->file_path)) {
            abort(404, 'Dataset file not found.');
        }

        return Storage::disk('public')->download(
            $dataset->file_path,
            $dataset->dataset_name . '.' . $dataset->file_type
        );
    }

    public function destroy(Dataset $dataset)
    {
        if (Storage::disk('public')->exists($dataset->file_path)) {
            Storage::disk('public')->delete($dataset->file_path);
        }

        $dataset->delete();

        return redirect()
            ->route('datasets.index')
            ->with('success', 'Dataset deleted successfully!');
    }
}