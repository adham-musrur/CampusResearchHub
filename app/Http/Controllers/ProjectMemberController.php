<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ResearchProject;
use App\Models\ProjectMember;
use App\Notifications\ProjectMemberAdded;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{

    /**
     * Add member to project
     */
    public function store(Request $request, ResearchProject $project)
    {

        $this->authorize('manageMembers', $project);


        $request->validate([

            'user_id' => [
                'required',
                'exists:users,id'
            ],

            'member_role' => [
                'required',
                'string'
            ],

        ]);



        // Faculty can only add Students
        if (
            strtolower(auth()->user()->role) === 'faculty'
            &&
            $request->member_role !== 'Student'
        ) {

            abort(403);

        }



        // Prevent duplicate member
        $exists = ProjectMember::where('project_id', $project->id)
            ->where('user_id', $request->user_id)
            ->exists();



        if ($exists) {

            return back()
                ->with('success', 'User is already a project member.');

        }



        ProjectMember::create([

            'project_id' => $project->id,

            'user_id' => $request->user_id,

            'member_role' => $request->member_role,

        ]);



        $user = User::find($request->user_id);


        if ($user) {

            $user->notify(
                new ProjectMemberAdded($project)
            );

        }



        return redirect()
            ->back()
            ->with('success', 'Member added successfully.');

    }




    /**
     * Remove member from project
     */
    public function destroy(
        ResearchProject $project,
        ProjectMember $member
    ) {


        $this->authorize('manageMembers', $project);



        // Make sure member belongs to this project
        if ($member->project_id !== $project->id) {

            abort(403);

        }



        $member->delete();



        return redirect()
            ->back()
            ->with('success', 'Member removed successfully.');

    }

}