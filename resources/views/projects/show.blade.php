<x-app-layout>

<div class="max-w-5xl mx-auto py-10 px-4">


@if(session('success'))

<div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
    {{ session('success') }}
</div>

@endif



<div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">


{{-- Header --}}

<div class="bg-gray-100 dark:bg-gray-700 px-6 py-5">

<div class="flex justify-between items-start gap-4">


<div>

<h1 class="text-3xl font-bold text-gray-900 dark:text-white">
{{ $project->title }}
</h1>

<p class="mt-2 text-gray-500">
Research Project
</p>

</div>



<div>

@if($project->status === 'pending')

<span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-800">
Pending
</span>


@elseif($project->status === 'approved')

<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800">
Approved
</span>


@elseif($project->status === 'completed')

<span class="px-3 py-1 rounded-full bg-green-100 text-green-800">
Completed
</span>


@endif

</div>


</div>

</div>





<div class="p-6">


{{-- Description --}}

<div class="mb-8">

<h2 class="text-lg font-semibold mb-2">
Description
</h2>

<p>
{{ $project->description }}
</p>

</div>





{{-- Information --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">


<div class="border rounded-lg p-4">

<p class="text-sm text-gray-500">
Department
</p>

<p class="font-semibold">
{{ $project->department }}
</p>

</div>



<div class="border rounded-lg p-4">

<p class="text-sm text-gray-500">
Research Area
</p>

<p class="font-semibold">
{{ $project->research_area }}
</p>

</div>



<div class="border rounded-lg p-4">

<p class="text-sm text-gray-500">
Deadline
</p>

<p class="font-semibold">
{{ $project->deadline }}
</p>

</div>



<div class="border rounded-lg p-4">

<p class="text-sm text-gray-500">
Created By
</p>

<p class="font-semibold">
{{ $project->user->name ?? 'Unknown' }}
</p>

</div>


</div>





{{-- Project Members --}}

<div class="mt-10">


<h2 class="text-xl font-bold mb-4">
Project Members
</h2>




@forelse($project->members as $member)


<div class="flex justify-between items-center border rounded-lg p-4 mb-3">


<div>

<p class="font-semibold">
{{ $member->user->name }}
</p>


<p class="text-sm text-gray-500">
Role:
{{ $member->member_role }}
</p>


</div>





@if(in_array(strtolower(auth()->user()->role), ['faculty','supervisor','admin']))


<form
method="POST"
action="{{ route('projects.members.destroy',[$project,$member]) }}"
>


@csrf

@method('DELETE')


<button
type="submit"
class="px-3 py-2 bg-red-600 text-white rounded-lg"
onclick="return confirm('Remove this member?')"
>

Remove

</button>


</form>


@endif



</div>



@empty


<p class="text-gray-500">
No members added yet.
</p>


@endforelse





{{-- Add Member --}}


@if(in_array(strtolower(auth()->user()->role), ['faculty','supervisor','admin']))



<div class="mt-8 border rounded-lg p-5">


<h3 class="text-lg font-semibold mb-4">
Add New Member
</h3>




<form
method="POST"
action="{{ route('projects.members.store',$project) }}"
>


@csrf




<div class="grid grid-cols-1 md:grid-cols-2 gap-5">



<div>


<label class="block mb-2">
Select User
</label>



<select
name="user_id"
class="w-full rounded-lg border"
>


@foreach(\App\Models\User::all() as $user)


<option value="{{ $user->id }}">

{{ $user->name }}
({{ $user->role }})

</option>


@endforeach


</select>


</div>





<div>


<label class="block mb-2">
Member Role
</label>




<select
name="member_role"
class="w-full rounded-lg border"
>



@if(strtolower(auth()->user()->role) === 'faculty')


<option value="Student">
Student
</option>


@else


<option value="Student">
Student
</option>


<option value="Faculty">
Faculty
</option>


<option value="Supervisor">
Supervisor
</option>


@endif



</select>


</div>



</div>





<button
type="submit"
class="mt-5 px-5 py-2 bg-green-600 text-white rounded-lg"
>

Add Member

</button>



</form>



</div>


@endif



</div>






{{-- Action Buttons --}}

<div class="mt-8 flex flex-wrap gap-3">


<a
href="{{ route('projects.edit',$project) }}"
class="px-5 py-2 bg-blue-600 text-white rounded-lg"
>

Edit Project

</a>




<form
method="POST"
action="{{ route('projects.destroy',$project) }}"
onsubmit="return confirm('Delete this project?');"
>


@csrf

@method('DELETE')


<button
type="submit"
class="px-5 py-2 bg-red-600 text-white rounded-lg"
>

Delete Project

</button>


</form>




<a
href="{{ route('projects.discussions',$project) }}"
class="px-5 py-2 bg-purple-600 text-white rounded-lg"
>

Discussions

</a>




<a
href="{{ route('projects.index') }}"
class="px-5 py-2 bg-gray-600 text-white rounded-lg"
>

Back

</a>


</div>




</div>


</div>


</div>


</x-app-layout>