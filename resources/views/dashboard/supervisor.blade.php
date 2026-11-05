<x-app-layout>

<div class="space-y-10">



{{-- HERO --}}

<div class="relative overflow-hidden
bg-gradient-to-r from-indigo-700 via-purple-600 to-teal-600
rounded-3xl p-10 text-white shadow-xl">


<div class="relative z-10">


<h1 class="text-4xl font-bold">

Welcome,
{{ auth()->user()->name }} 🎯

</h1>


<p class="mt-3 text-indigo-100 text-lg">

Monitor research projects, guide teams and track academic progress.

</p>



<div class="mt-6">

<a href="{{ route('projects.index') }}"
class="bg-white text-indigo-700 px-6 py-3 rounded-xl font-semibold">

View Projects

</a>

</div>


</div>



<div class="absolute right-10 top-10 text-8xl opacity-20">

🎓

</div>


</div>







{{-- STATISTICS --}}


<div class="grid grid-cols-1 md:grid-cols-3 gap-6">



@php

$cards = [

[
'icon'=>'📁',
'title'=>'Assigned Projects',
'value'=>$stats['projects']
],

[
'icon'=>'👥',
'title'=>'Total Members',
'value'=>$stats['members']
],

[
'icon'=>'📝',
'title'=>'Research Updates',
'value'=>$stats['updates']
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


<h2 class="text-4xl font-bold mt-3 text-indigo-700">

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








{{-- PROJECTS --}}


<div class="dashboard-card p-8">


<div class="flex justify-between items-center mb-6">


<h2 class="text-2xl font-bold">

Assigned Research Projects

</h2>



<a href="{{ route('projects.index') }}"
class="text-teal-600 font-semibold">

View All →

</a>


</div>





<div class="space-y-6">



@forelse($supervisedProjects as $item)


<div class="border rounded-2xl p-6 hover:shadow-lg transition">


<div class="flex justify-between items-start">


<div>


<h3 class="text-xl font-bold">

{{ $item->project->title }}

</h3>



<p class="text-slate-500 mt-3">

{{ Str::limit($item->project->description,150) }}

</p>


</div>



<span class="px-4 py-2 rounded-full
bg-indigo-100 text-indigo-700 text-sm">

Supervisor

</span>



</div>





<div class="mt-6 flex gap-3">


<a href="{{ route('projects.show',$item->project) }}"
class="bg-teal-600 text-white px-5 py-2 rounded-xl">

Open Project

</a>




<a href="{{ route('projects.discussions',$item->project) }}"
class="border border-teal-600 text-teal-600 px-5 py-2 rounded-xl">

Discussion

</a>


</div>


</div>



@empty


<p class="text-slate-500">

No assigned projects found.

</p>


@endforelse



</div>


</div>









{{-- RESPONSIBILITIES --}}


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-6">

Supervisor Responsibilities

</h2>




<div class="grid md:grid-cols-3 gap-6">



<div class="border rounded-2xl p-6">

<div class="text-4xl mb-4">

👥

</div>


<h3 class="font-bold text-lg">

Team Management

</h3>


<p class="text-slate-500 mt-2">

Monitor project members and collaboration.

</p>


</div>






<div class="border rounded-2xl p-6">

<div class="text-4xl mb-4">

📊

</div>


<h3 class="font-bold text-lg">

Research Progress

</h3>


<p class="text-slate-500 mt-2">

Track project activities and updates.

</p>


</div>







<div class="border rounded-2xl p-6">

<div class="text-4xl mb-4">

💬

</div>


<h3 class="font-bold text-lg">

Collaboration

</h3>


<p class="text-slate-500 mt-2">

Communicate with research teams.

</p>


</div>



</div>


</div>




</div>


</x-app-layout>