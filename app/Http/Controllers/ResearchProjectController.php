<?php

namespace App\Http\Controllers;

use App\Models\ResearchProject;
use Illuminate\Http\Request;

class ResearchProjectController extends Controller
{
    /**
     * Display all research projects.
     */
    public function index()
    {
        $projects = ResearchProject::latest()->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show create project form.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a new research project.
     */
    public function store(Request $request)
    {
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
        return view('projects.show', compact('project'));
    }

    /**
     * Show edit project form.
     */
    public function edit(ResearchProject $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update research project.
     */
    public function update(Request $request, ResearchProject $project)
    {
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
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}