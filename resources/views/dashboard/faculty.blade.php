<x-app-layout>

<div class="space-y-10">


{{-- HERO --}}

<div class="relative overflow-hidden
bg-gradient-to-r from-teal-700 via-emerald-600 to-cyan-600
rounded-3xl p-10 text-white shadow-xl">


<div class="relative z-10">


<h1 class="text-4xl font-bold">

Welcome,
{{ auth()->user()->name }} 👨‍🏫

</h1>


<p class="mt-3 text-emerald-100 text-lg">

Manage your research projects, publications and academic contributions.

</p>



<div class="mt-6">

<a href="{{ route('projects.create') }}"
class="bg-white text-teal-700 px-6 py-3 rounded-xl font-semibold">

Start New Research

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
'title'=>'Research Projects',
'value'=>$stats['projects']
],

[
'icon'=>'📄',
'title'=>'Published Papers',
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


<div class="dashboard-card p-6
hover:-translate-y-1 transition">


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









{{-- ACTIONS --}}


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-6">

Research Actions

</h2>



<div class="grid md:grid-cols-3 gap-6">



<a href="{{ route('projects.create') }}"
class="rounded-2xl p-6 bg-teal-600 text-white
hover:shadow-xl transition">


<div class="text-4xl mb-4">

➕

</div>


<h3 class="text-xl font-bold">

Create Project

</h3>


<p class="mt-2 text-teal-100">

Start a new research activity.

</p>


</a>






<a href="{{ route('papers.create') }}"
class="rounded-2xl p-6 bg-slate-900 text-white
hover:shadow-xl transition">


<div class="text-4xl mb-4">

📄

</div>


<h3 class="text-xl font-bold">

Upload Paper

</h3>


<p class="mt-2 text-slate-300">

Share academic publications.

</p>


</a>






<a href="{{ route('datasets.create') }}"
class="rounded-2xl p-6 bg-cyan-600 text-white
hover:shadow-xl transition">


<div class="text-4xl mb-4">

📊

</div>


<h3 class="text-xl font-bold">

Upload Dataset

</h3>


<p class="mt-2 text-cyan-100">

Publish research data.

</p>


</a>


</div>


</div>









{{-- PROJECTS --}}


<div class="dashboard-card p-8">


<div class="flex justify-between items-center mb-6">


<h2 class="text-2xl font-bold">

My Research Projects

</h2>


<a href="{{ route('projects.index') }}"
class="text-teal-600 font-semibold">

View All →

</a>


</div>





<div class="grid md:grid-cols-2 gap-6">



@forelse($facultyProjects as $project)


<div class="border rounded-2xl p-6
hover:shadow-lg transition">


<h3 class="font-bold text-xl">

{{ $project->title }}

</h3>



<p class="text-slate-500 mt-3">

{{ Str::limit($project->description,120) }}

</p>




<div class="mt-5 flex justify-between items-center">


<span class="px-3 py-1 rounded-full
bg-teal-100 text-teal-700 text-sm">

{{ ucfirst($project->status) }}

</span>



<a href="{{ route('projects.show',$project) }}"
class="text-teal-600 font-semibold">

Open →

</a>


</div>


</div>


@empty


<div class="text-slate-500">

No research projects yet.

</div>


@endforelse



</div>


</div>









{{-- OUTPUT --}}


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-6">

Research Output

</h2>



<div class="grid md:grid-cols-2 gap-6">



<div class="border rounded-2xl p-6">


<h3 class="font-bold text-lg mb-4">

📄 Recent Papers

</h3>



@forelse($facultyPapers as $paper)


<p class="mb-3 text-slate-600">

📄 {{ $paper->title }}

</p>


@empty


<p class="text-slate-500">

No papers uploaded.

</p>


@endforelse


</div>







<div class="border rounded-2xl p-6">


<h3 class="font-bold text-lg mb-4">

📊 Recent Datasets

</h3>




@forelse($facultyDatasets as $dataset)


<p class="mb-3 text-slate-600">

📊 {{ $dataset->dataset_name }}

</p>


@empty


<p class="text-slate-500">

No datasets uploaded.

</p>


@endforelse



</div>



</div>


</div>






</div>


</x-app-layout>