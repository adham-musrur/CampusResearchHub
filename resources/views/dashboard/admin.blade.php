<x-app-layout>


<div class="space-y-10">



{{-- HERO --}}


<div class="relative overflow-hidden
bg-gradient-to-r from-teal-700 via-cyan-600 to-blue-600
rounded-3xl p-10 text-white shadow-xl">


<div class="relative z-10">


<h1 class="text-4xl font-bold">

Welcome back,
{{ auth()->user()->name }} 👋

</h1>


<p class="mt-3 text-teal-100 text-lg">

Control research activities, users and academic resources from one place.

</p>



<div class="mt-6 flex gap-4">


<a href="{{ route('admin.users.index') }}"
class="bg-white text-teal-700 px-6 py-3 rounded-xl font-semibold">

Manage Users

</a>



<a href="{{ route('research.public') }}"
class="bg-white/20 text-white px-6 py-3 rounded-xl font-semibold">

View Research

</a>



</div>


</div>




<div class="absolute right-10 top-10 text-8xl opacity-20">

🎓

</div>



</div>







{{-- STATISTICS --}}


<div class="grid grid-cols-1 sm:grid-cols-2
lg:grid-cols-5 gap-6">



@php

$cards = [

[
'icon'=>'📁',
'title'=>'Projects',
'value'=>$stats['projects']
],

[
'icon'=>'📄',
'title'=>'Papers',
'value'=>$stats['papers']
],

[
'icon'=>'📊',
'title'=>'Datasets',
'value'=>$stats['datasets']
],

[
'icon'=>'📝',
'title'=>'Updates',
'value'=>$stats['updates']
],

[
'icon'=>'💬',
'title'=>'Discussions',
'value'=>$stats['discussions']
]

];

@endphp





@foreach($cards as $card)


<div class="dashboard-card p-6
hover:-translate-y-1 transition duration-300">


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









{{-- QUICK ACTIONS --}}


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-6">

Quick Actions

</h2>



<div class="grid md:grid-cols-3 gap-6">



<a href="{{ route('projects.create') }}"
class="rounded-2xl p-6
bg-teal-600 text-white
hover:shadow-xl transition">


<div class="text-4xl mb-4">

➕

</div>


<h3 class="text-xl font-bold">

Create Project

</h3>


<p class="mt-2 text-teal-100">

Start new research work.

</p>


</a>






<a href="{{ route('papers.create') }}"
class="rounded-2xl p-6
bg-slate-900 text-white
hover:shadow-xl transition">


<div class="text-4xl mb-4">

📄

</div>


<h3 class="text-xl font-bold">

Upload Paper

</h3>


<p class="mt-2 text-slate-300">

Publish research documents.

</p>


</a>






<a href="{{ route('datasets.create') }}"
class="rounded-2xl p-6
bg-cyan-600 text-white
hover:shadow-xl transition">


<div class="text-4xl mb-4">

📊

</div>


<h3 class="text-xl font-bold">

Upload Dataset

</h3>


<p class="mt-2 text-cyan-100">

Share research data.

</p>


</a>



</div>


</div>









{{-- SYSTEM INFO --}}


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-6">

System Information

</h2>



<div class="grid md:grid-cols-3 gap-6">



<div>

<p class="text-sm text-slate-500">

Current Role

</p>


<p class="font-bold text-teal-700">

{{ auth()->user()->role }}

</p>


</div>





<div>

<p class="text-sm text-slate-500">

Account

</p>


<p class="font-bold">

{{ auth()->user()->email }}

</p>


</div>





<div>

<p class="text-sm text-slate-500">

Platform

</p>


<p class="font-bold">

CampusResearchHub

</p>


</div>




</div>


</div>




</div>


</x-app-layout>