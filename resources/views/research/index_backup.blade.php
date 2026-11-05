<x-app-layout>

<div class="max-w-7xl mx-auto py-10 px-4">


<h1 class="text-3xl font-bold mb-8">
CampusResearchHub Research Portal
</h1>



{{-- Research Papers --}}

<div class="bg-white rounded-xl shadow p-6 mb-8">


<h2 class="text-xl font-bold mb-5">
Research Papers
</h2>


@forelse($papers as $paper)


<div class="border-b pb-4 mb-4">


<h3 class="text-lg font-semibold">
{{ $paper->title }}
</h3>


<p class="text-sm text-gray-500">

Category:
{{ $paper->category }}

</p>


<p class="mt-2">

{{ $paper->abstract }}

</p>


<p class="text-sm text-gray-500 mt-2">

Author:
{{ $paper->author->name ?? 'Unknown' }}

</p>



</div>


@empty

<p>
No research papers available.
</p>


@endforelse


</div>





{{-- Datasets --}}

<div class="bg-white rounded-xl shadow p-6 mb-8">


<h2 class="text-xl font-bold mb-5">
Datasets
</h2>



@forelse($datasets as $dataset)


<div class="border-b pb-4 mb-4">


<h3 class="text-lg font-semibold">

{{ $dataset->dataset_name }}

</h3>



<p>

{{ $dataset->description }}

</p>



<p class="text-sm text-gray-500">

Uploaded By:
{{ $dataset->uploader->name ?? 'Unknown' }}

</p>



<p class="text-sm text-gray-500">

Type:
{{ $dataset->file_type }}

</p>



</div>



@empty

<p>
No datasets available.
</p>

@endforelse



</div>






{{-- Research Updates --}}

<div class="bg-white rounded-xl shadow p-6">


<h2 class="text-xl font-bold mb-5">
Research Updates
</h2>




@forelse($updates as $update)



<div class="border-b pb-4 mb-4">


<h3 class="text-lg font-semibold">

{{ $update->title }}

</h3>



<p>

{{ $update->description }}

</p>



<p class="text-sm text-gray-500">

Published By:
{{ $update->publisher->name ?? 'Unknown' }}

</p>


</div>



@empty

<p>
No updates available.
</p>


@endforelse



</div>



</div>

</x-app-layout>