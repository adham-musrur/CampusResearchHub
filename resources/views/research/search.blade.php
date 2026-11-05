<x-app-layout>

<div class="max-w-7xl mx-auto space-y-8">



{{-- Header --}}

<div class="bg-gradient-to-r from-teal-700 to-cyan-600
rounded-3xl p-8 text-white shadow-xl">


<h1 class="text-4xl font-bold">

Research Discovery

</h1>


<p class="mt-3 text-teal-100">

Search projects, papers, datasets and research updates.

</p>


</div>








{{-- Search Box --}}

<div class="dashboard-card p-6">


<form method="GET"
action="{{ route('research.search') }}">


<div class="flex flex-col md:flex-row gap-4">


<input
type="text"
name="search"
value="{{ $search }}"
placeholder="Search research..."
class="flex-1 rounded-xl">


<button
class="px-8 py-3 rounded-xl
bg-teal-600 text-white font-semibold">


Search


</button>


</div>


</form>


</div>









{{-- Projects --}}

@if($projects->count())


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-5">

🚀 Research Projects

</h2>



<div class="grid md:grid-cols-2 gap-5">


@foreach($projects as $project)


<a href="{{ route('projects.show',$project) }}"
class="block border rounded-xl p-5 hover:shadow-lg transition">


<h3 class="font-bold text-lg">

{{ $project->title }}

</h3>


<p class="text-sm text-slate-500 mt-2">

{{ Str::limit($project->description,100) }}

</p>


</a>


@endforeach


</div>


</div>


@endif







{{-- Papers --}}

@if($papers->count())


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-5">

📄 Research Papers

</h2>


<div class="space-y-4">


@foreach($papers as $paper)


<div class="border rounded-xl p-5">


<h3 class="font-bold">

{{ $paper->title }}

</h3>


<p class="text-sm text-slate-500 mt-2">

{{ $paper->category }}

</p>


</div>


@endforeach


</div>


</div>


@endif







{{-- Datasets --}}

@if($datasets->count())


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-5">

📊 Datasets

</h2>



<div class="grid md:grid-cols-2 gap-5">


@foreach($datasets as $dataset)


<div class="border rounded-xl p-5">


<h3 class="font-bold">

{{ $dataset->dataset_name }}

</h3>


<p class="text-slate-500 mt-2">

{{ Str::limit($dataset->description,100) }}

</p>


</div>


@endforeach


</div>


</div>


@endif







{{-- Updates --}}

@if($updates->count())


<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-5">

📰 Research Updates

</h2>



<div class="grid md:grid-cols-2 gap-5">


@foreach($updates as $update)


<div class="border rounded-xl p-5">


<h3 class="font-bold">

{{ $update->title }}

</h3>


<p class="text-slate-500 mt-2">

{{ Str::limit($update->description,100) }}

</p>


</div>


@endforeach


</div>


</div>


@endif







@if(
    !$projects->count() &&
    !$papers->count() &&
    !$datasets->count() &&
    !$updates->count()
)

<div class="dashboard-card p-10 text-center">


<div class="text-5xl mb-4">

🔍

</div>


<h2 class="text-xl font-bold">

No Research Found

</h2>


<p class="text-slate-500 mt-2">

Try searching with different keywords.

</p>


</div>


@endif






</div>


</x-app-layout>