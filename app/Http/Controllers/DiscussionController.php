<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\ResearchProject;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{

    public function index(ResearchProject $project)
    {
        $discussions = Discussion::with('user')
            ->where('project_id', $project->id)
            ->latest()
            ->get();


        return view('discussions.index', compact(
            'project',
            'discussions'
        ));
    }



    public function store(Request $request, ResearchProject $project)
    {

        $this->authorize('create', Discussion::class);


        $request->validate([

            'message' => 'required|string|max:5000',

        ]);



        Discussion::create([

            'project_id' => $project->id,

            'user_id' => auth()->id(),

            'message' => $request->message,

        ]);



        return redirect()
            ->route('projects.discussions', $project)
            ->with('success', 'Discussion posted successfully!');

    }




    public function destroy(Discussion $discussion)
    {

        $this->authorize('delete', $discussion);



        $projectId = $discussion->project_id;


        $discussion->delete();



        return redirect()
            ->route('projects.discussions', $projectId)
            ->with('success', 'Discussion deleted successfully!');

    }

}