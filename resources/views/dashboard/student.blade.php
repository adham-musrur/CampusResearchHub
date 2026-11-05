<x-app-layout>

<div class="space-y-10">



{{-- HERO --}}

<div class="relative overflow-hidden
bg-gradient-to-r from-cyan-600 via-teal-600 to-emerald-600
rounded-3xl p-10 text-white shadow-xl">


<div class="relative z-10">


<h1 class="text-4xl font-bold">

Welcome,
{{ auth()->user()->name }} 👋

</h1>


<p class="mt-3 text-cyan-100 text-lg">

Continue your research journey and collaborate with your academic team.

</p>



<div class="mt-6">

<a href="{{ route('projects.create') }}"
class="bg-white text-teal-700 px-6 py-3 rounded-xl font-semibold">

Create Research Project

</a>

</div>


</div>



<div class="absolute right-10 top-10 text-8xl opacity-20">

🎓

</div>


</div>








{{-- STATISTICS --}}


<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">



@php

$cards = [

[
'icon'=>'📁',
'title'=>'My Projects',
'value'=>$stats['projects']
],

[
'icon'=>'👥',
'title'=>'Team Projects',
'value'=>$stats['team_projects']
],

[
'icon'=>'📄',
'title'=>'Research Papers',
'value'=>$stats['papers']
],

[
'icon'=>'📊',
'title'=>'Datasets',
'value'=>$stats['datasets']
]

];

@endphp





@foreach($cards as $card)


<div class="dashboard-card p-6 hover:-translate-y-1 transition">


<div class="flex justify-between">


<div>


<p class="text-sm text-slate-500">

{{ $card['title'] }}

</p>


<h2 class="text-4xl font-bold mt-3 text-teal-700">

{{ $card['value'] }}

</h2>


</div>


<div class="text-4xl">

{{ $card['icon'] }}

</div>


</div>


</div>


@endforeach



</div>









{{-- MY PROJECTS --}}


<div class="dashboard-card p-8">


<div class="flex justify-between items-center mb-6">


<h2 class="text-2xl font-bold">

My Research Projects

</h2>


<a href="{{ route('projects.create') }}"
class="bg-teal-600 text-white px-5 py-2 rounded-xl">

+ New Project

</a>


</div>





<div class="grid md:grid-cols-2 gap-6">



@forelse($studentProjects as $project)


<div class="border rounded-2xl p-6 hover:shadow-lg transition">


<h3 class="text-xl font-bold">

{{ $project->title }}

</h3>


<p class="text-slate-500 mt-3">

{{ Str::limit($project->description,120) }}

</p>



<div class="mt-5">

<span class="px-4 py-2 rounded-full
bg-teal-100 text-teal-700 text-sm">

{{ ucfirst($project->status) }}

</span>

</div>


</div>


@empty


<p class="text-slate-500">

No projects created yet.

</p>


@endforelse



</div>


</div>









{{-- COLLABORATION --}}


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-6">

Collaboration Projects

</h2>





<div class="space-y-5">



@forelse($memberProjects as $member)


<div class="border rounded-2xl p-6 flex justify-between items-center">


<div>


<h3 class="font-bold text-lg">

{{ $member->project->title }}

</h3>



<p class="text-sm text-slate-500">

Role:
{{ $member->member_role }}

</p>


</div>



<a href="{{ route('projects.show',$member->project) }}"
class="text-teal-600 font-semibold">

View →

</a>


</div>



@empty


<p class="text-slate-500">

No collaboration projects.

</p>


@endforelse



</div>


</div>









{{-- UPDATES --}}


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-6">

Latest Research Updates

</h2>



<div class="space-y-5">



@forelse($recentUpdates as $update)


<div class="border-b pb-5">


<h3 class="font-bold text-lg">

{{ $update->title }}

</h3>


<p class="text-slate-500 mt-2">

{{ Str::limit($update->description,100) }}

</p>


</div>



@empty


<p class="text-slate-500">

No updates available.

</p>


@endforelse



</div>


</div>







</div>


</x-app-layout>