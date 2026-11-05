<x-app-layout>

<div class="max-w-7xl mx-auto space-y-8">



{{-- Header --}}

<div class="bg-gradient-to-r from-teal-700 to-cyan-600
rounded-3xl p-8 text-white shadow-xl">


<div class="flex flex-col md:flex-row
justify-between gap-5">


<div>

<h1 class="text-3xl font-bold">

Research Datasets

</h1>


<p class="mt-2 text-teal-100">

Explore, manage and share research data resources.

</p>


</div>




<a href="{{ route('datasets.create') }}"
class="px-6 py-3 rounded-xl
bg-white text-teal-700 font-semibold">


+ Upload Dataset


</a>


</div>


</div>









@if(session('success'))

<div class="bg-green-100 border border-green-300
text-green-700 px-5 py-4 rounded-xl">

{{ session('success') }}

</div>

@endif







{{-- Search --}}

<div class="dashboard-card p-6">


<form method="GET"
action="{{ route('datasets.index') }}"
class="grid md:grid-cols-3 gap-4">


<input
type="text"
name="search"
value="{{ $search ?? '' }}"
placeholder="Search datasets..."
class="rounded-xl">





<select
name="file_type"
class="rounded-xl">


<option value="">

All File Types

</option>


@foreach($fileTypes as $type)


<option value="{{ $type }}"
@selected(($fileType ?? '')==$type)>


{{ strtoupper($type) }}


</option>


@endforeach


</select>





<button
class="rounded-xl bg-teal-600
text-white font-semibold">


Search Dataset


</button>


</form>


</div>









{{-- Dataset Cards --}}


@if($datasets->count())


<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">



@foreach($datasets as $dataset)



<div class="dashboard-card p-6
hover:shadow-xl transition">



<div class="flex justify-between items-start">


<div class="text-5xl">

📊

</div>


<span
class="px-3 py-1 rounded-full
bg-cyan-100 text-cyan-700
text-xs font-semibold">


{{ strtoupper($dataset->file_type) }}


</span>


</div>








<h2 class="text-xl font-bold mt-5">


{{ $dataset->dataset_name }}


</h2>







<p class="text-slate-500 text-sm mt-3">


{{ Str::limit($dataset->description,130) }}


</p>







<div class="mt-5 space-y-2 text-sm">


@if($dataset->project)

<p>

🔬

{{ $dataset->project->title }}

</p>

@endif





@if($dataset->uploader)

<p>

👤

{{ $dataset->uploader->name }}

</p>

@endif



<p>

📁

{{ strtoupper($dataset->file_type) }}

</p>


</div>








<div class="mt-6 space-y-3">



<a href="{{ route('datasets.show',$dataset) }}"
class="block text-center
px-4 py-3 rounded-xl
bg-slate-800 text-white">


View Dataset


</a>





<a href="{{ route('datasets.download',$dataset) }}"
class="block text-center
px-4 py-3 rounded-xl
bg-teal-600 text-white">


Download


</a>





<form method="POST"
action="{{ route('datasets.destroy',$dataset) }}"
onsubmit="return confirm('Delete this dataset?');">


@csrf

@method('DELETE')


<button
class="w-full px-4 py-3 rounded-xl
bg-red-600 text-white">


Delete


</button>


</form>



</div>



</div>




@endforeach


</div>






@else


<div class="dashboard-card p-10 text-center">


<div class="text-5xl mb-4">

📂

</div>


<h2 class="text-xl font-bold">

No datasets found

</h2>


<p class="text-slate-500 mt-2">

Upload your first research dataset.

</p>


</div>


@endif








<div class="mt-8">

{{ $datasets->links() }}

</div>




</div>


</x-app-layout>