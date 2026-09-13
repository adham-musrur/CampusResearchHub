<?php

namespace App\Http\Controllers;

use App\Models\ResearchProject;
use Illuminate\Http\Request;

class ResearchProjectController extends Controller
{

    /**
     * Display all research projects with search and filters.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $department = $request->department;
        $status = $request->status;

        $projects = ResearchProject::query()

            ->when($search, function ($query, $search) {

                $query->where(function ($q) use ($search) {

                    $q->where('title', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%')
                      ->orWhere('research_area', 'like', '%' . $search . '%');

                });

            })

            ->when($department, function ($query, $department) {

                $query->where('department', $department);

            })

            ->when($status, function ($query, $status) {

                $query->where('status', $status);

            })

            ->latest()
            ->paginate(10)
            ->withQueryString();


        $departments = ResearchProject::select('department')
            ->distinct()
            ->pluck('department');


        return view('projects.index', compact(
            'projects',
            'departments',
            'search',
            'department',
            'status'
        ));
    }


    /**
     * Show create project form.
     */
    public function create()
    {
        $this->authorize('create', ResearchProject::class);

        return view('projects.create');
    }


    /**
     * Store a new research project.
     */
    public function store(Request $request)
    {
        $this->authorize('create', ResearchProject::class);


        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'department' => 'required',
            'research_area' => 'required',
            'deadline' => 'required|date',
        ]);


        ResearchProject::create([
            'title' => $request->title,
            'description' => $request->description,
            'department' => $request->department,
            'research_area' => $request->research_area,
            'deadline' => $request->deadline,
            'status' => 'pending',
            'user_id' => auth()->id(),
        ]);


        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully!');
    }


    /**
     * Display one research project.
     */
    public function show(ResearchProject $project)
    {
        $project->load('members.user');

        return view('projects.show', compact('project'));
    }


    /**
     * Show edit project form.
     */
    public function edit(ResearchProject $project)
    {
        $this->authorize('update', $project);

        return view('projects.edit', compact('project'));
    }


    /**
     * Update research project.
     */
    public function update(Request $request, ResearchProject $project)
    {
        $this->authorize('update', $project);


        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'department' => 'required',
            'research_area' => 'required',
            'deadline' => 'required|date',
            'status' => 'required|in:pending,approved,completed',
        ]);


        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'department' => $request->department,
            'research_area' => $request->research_area,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);


        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Project updated successfully!');
    }


    /**
     * Delete research project.
     */
    public function destroy(ResearchProject $project)
    {
        $this->authorize('delete', $project);


        $project->delete();


        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully!');
    }

}