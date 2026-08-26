<x-app-layout>


<div class="max-w-7xl mx-auto py-10 px-4">


<h1 class="text-3xl font-bold mb-6">
Research Search
</h1>



<form method="GET"
action="{{ route('research.search') }}"
class="mb-8">


<input
type="text"
name="search"
value="{{ $search }}"
placeholder="Search research..."
class="border rounded-lg px-4 py-2 w-full">


</form>





{{-- Projects --}}

@if($projects->count())

<div class="bg-white shadow rounded-xl p-6 mb-6">

<h2 class="text-xl font-bold mb-4">
Research Projects
</h2>


@foreach($projects as $project)

<p class="mb-3">

<a href="{{ route('projects.show',$project) }}"
class="text-blue-600">

{{ $project->title }}

</a>

</p>

@endforeach


</div>

@endif





{{-- Papers --}}

@if($papers->count())

<div class="bg-white shadow rounded-xl p-6 mb-6">

<h2 class="text-xl font-bold mb-4">
Research Papers
</h2>


@foreach($papers as $paper)

<p class="mb-3">

{{ $paper->title }}

</p>

@endforeach


</div>

@endif





{{-- Datasets --}}

@if($datasets->count())

<div class="bg-white shadow rounded-xl p-6 mb-6">


<h2 class="text-xl font-bold mb-4">
Datasets
</h2>


@foreach($datasets as $dataset)

<p class="mb-3">

{{ $dataset->dataset_name }}

</p>

@endforeach


</div>

@endif





{{-- Updates --}}

@if($updates->count())

<div class="bg-white shadow rounded-xl p-6">


<h2 class="text-xl font-bold mb-4">
Research Updates
</h2>


@foreach($updates as $update)

<p class="mb-3">

{{ $update->title }}

</p>

@endforeach


</div>

@endif



</div>


</x-app-layout>