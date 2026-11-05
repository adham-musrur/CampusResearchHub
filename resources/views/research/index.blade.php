<x-app-layout>

<div class="max-w-7xl mx-auto space-y-10">



{{-- Hero Section --}}

<div class="bg-gradient-to-r from-teal-700 to-cyan-600
rounded-3xl p-10 text-white shadow-xl">


<h1 class="text-4xl md:text-5xl font-bold">

CampusResearchHub

</h1>


<p class="mt-4 text-xl text-teal-100">

Discover academic research, datasets and innovation from our research community.

</p>



</div>









{{-- Research Papers --}}

<div class="space-y-5">


<div class="flex items-center justify-between">


<h2 class="text-3xl font-bold">

📄 Research Papers

</h2>


</div>





<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">


@forelse($papers as $paper)


<div class="dashboard-card p-6">


<div class="text-4xl mb-4">

📄

</div>



<h3 class="text-xl font-bold">

{{ $paper->title }}

</h3>



<span class="inline-block mt-3 px-3 py-1 rounded-full
bg-teal-100 text-teal-700 text-sm">


{{ $paper->category }}


</span>



<p class="text-slate-500 mt-4">

{{ Str::limit($paper->abstract,120) }}

</p>




<p class="text-sm text-slate-500 mt-4">

Author:

{{ $paper->author->name ?? 'Unknown' }}

</p>



</div>


@empty


<div class="dashboard-card p-6">

No research papers available.

</div>


@endforelse


</div>


</div>









{{-- Datasets --}}

<div class="space-y-5">


<h2 class="text-3xl font-bold">

📊 Research Datasets

</h2>





<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">



@forelse($datasets as $dataset)



<div class="dashboard-card p-6">


<div class="text-4xl mb-4">

📊

</div>



<h3 class="text-xl font-bold">

{{ $dataset->dataset_name }}

</h3>




<p class="text-slate-500 mt-3">

{{ Str::limit($dataset->description,120) }}

</p>




<div class="mt-4 text-sm text-slate-500">


<p>

File:

{{ strtoupper($dataset->file_type) }}

</p>


<p>

Uploaded By:

{{ $dataset->uploader->name ?? 'Unknown' }}

</p>


</div>



</div>




@empty


<div class="dashboard-card p-6">

No datasets available.

</div>


@endforelse



</div>


</div>









{{-- Updates --}}

<div class="space-y-5">


<h2 class="text-3xl font-bold">

📰 Research Updates

</h2>





<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">


@forelse($updates as $update)



<div class="dashboard-card overflow-hidden">



@if($update->image)

<img
src="{{ asset('storage/'.$update->image) }}"
class="w-full h-48 object-cover">

@endif




<div class="p-6">


<h3 class="text-xl font-bold">

{{ $update->title }}

</h3>



<p class="text-slate-500 mt-3">

{{ Str::limit($update->description,120) }}

</p>



<p class="text-sm text-slate-500 mt-4">

Published by:

{{ $update->publisher->name ?? 'Unknown' }}

</p>


</div>



</div>




@empty


<div class="dashboard-card p-6">

No updates available.

</div>


@endforelse



</div>


</div>





</div>


</x-app-layout>