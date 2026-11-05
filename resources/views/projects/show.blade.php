<x-app-layout>

<div class="max-w-7xl mx-auto space-y-8">


@if(session('success'))

<div class="bg-green-100 border border-green-300
text-green-700 px-5 py-4 rounded-xl">

{{ session('success') }}

</div>

@endif






{{-- Project Header --}}

<div class="bg-gradient-to-r from-teal-700 to-cyan-600
rounded-3xl p-8 text-white shadow-xl">


<div class="flex flex-col md:flex-row
justify-between gap-6">


<div>

<div class="flex items-center gap-3 mb-3">


<h1 class="text-3xl md:text-4xl font-bold">

{{ $project->title }}

</h1>


</div>



<p class="text-teal-100">

Research Project Workspace

</p>



</div>




<div>


@if($project->status === 'pending')

<span class="px-5 py-2 rounded-full
bg-yellow-300 text-yellow-900 font-semibold">

Pending

</span>


@elseif($project->status === 'approved')

<span class="px-5 py-2 rounded-full
bg-blue-200 text-blue-900 font-semibold">

Approved

</span>


@else

<span class="px-5 py-2 rounded-full
bg-green-200 text-green-900 font-semibold">

Completed

</span>


@endif


</div>


</div>


</div>







{{-- Project Overview --}}

<div class="grid md:grid-cols-4 gap-6">


<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Department

</p>


<h3 class="font-bold text-lg mt-2">

{{ $project->department }}

</h3>


</div>




<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Research Area

</p>


<h3 class="font-bold text-lg mt-2">

{{ $project->research_area }}

</h3>


</div>





<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Deadline

</p>


<h3 class="font-bold text-lg mt-2">

{{ $project->deadline }}

</h3>


</div>





<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Created By

</p>


<h3 class="font-bold text-lg mt-2">

{{ $project->user->name ?? 'Unknown' }}

</h3>


</div>


</div>







{{-- Description --}}

<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-4">

Research Description

</h2>


<p class="text-slate-600 leading-relaxed">

{{ $project->description }}

</p>


</div>








{{-- Members --}}

<div class="dashboard-card p-8">


<div class="flex justify-between items-center mb-6">


<h2 class="text-2xl font-bold">

Research Team

</h2>


<span class="px-4 py-2 rounded-full
bg-teal-100 text-teal-700">

{{ $project->members->count() }} Members

</span>


</div>





<div class="space-y-4">


@forelse($project->members as $member)


<div class="flex justify-between items-center
border rounded-2xl p-5">


<div class="flex items-center gap-4">


<div class="w-12 h-12 rounded-full
bg-teal-600 text-white
flex items-center justify-center
font-bold">


{{ strtoupper(substr($member->user->name,0,1)) }}


</div>




<div>

<h3 class="font-bold">

{{ $member->user->name }}

</h3>


<p class="text-sm text-slate-500">

{{ $member->member_role }}

</p>


</div>


</div>






@if(in_array(strtolower(auth()->user()->role),
['faculty','supervisor','admin']))


<form method="POST"
action="{{ route('projects.members.destroy',
[$project,$member]) }}">


@csrf

@method('DELETE')


<button
onclick="return confirm('Remove this member?')"
class="px-4 py-2 rounded-xl
bg-red-500 text-white">


Remove


</button>


</form>


@endif



</div>


@empty


<p class="text-slate-500">

No members added yet.

</p>


@endforelse


</div>



</div>








{{-- Add Member --}}


@if(in_array(strtolower(auth()->user()->role),
['faculty','supervisor','admin']))


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-6">

Add Research Member

</h2>



<form method="POST"
action="{{ route('projects.members.store',$project) }}">


@csrf



<div class="grid md:grid-cols-2 gap-6">


<div>


<label class="block mb-2 font-semibold">

Select User

</label>


<select name="user_id"
class="w-full rounded-xl">


@foreach(\App\Models\User::all() as $user)


<option value="{{ $user->id }}">

{{ $user->name }} ({{ $user->role }})

</option>


@endforeach


</select>


</div>





<div>


<label class="block mb-2 font-semibold">

Member Role

</label>


<select name="member_role"
class="w-full rounded-xl">


<option value="Student">

Student

</option>



@if(strtolower(auth()->user()->role)!=='faculty')


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
class="mt-6 px-6 py-3 rounded-xl
bg-teal-600 text-white font-semibold">


Add Member


</button>


</form>


</div>


@endif







{{-- Actions --}}

<div class="dashboard-card p-6 flex flex-wrap gap-4">


<a href="{{ route('projects.edit',$project) }}"
class="px-6 py-3 rounded-xl
bg-blue-600 text-white">


Edit Project

</a>




<form method="POST"
action="{{ route('projects.destroy',$project) }}">


@csrf

@method('DELETE')


<button
onclick="return confirm('Delete this project?')"
class="px-6 py-3 rounded-xl
bg-red-600 text-white">


Delete Project


</button>


</form>





<a href="{{ route('projects.discussions',$project) }}"
class="px-6 py-3 rounded-xl
bg-purple-600 text-white">


Discussion


</a>




<a href="{{ route('projects.index') }}"
class="px-6 py-3 rounded-xl
bg-slate-700 text-white">


Back


</a>



</div>




</div>


</x-app-layout>