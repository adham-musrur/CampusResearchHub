<x-app-layout>

<div class="max-w-5xl mx-auto space-y-8">



{{-- Header --}}

<div class="bg-gradient-to-r from-teal-700 to-cyan-600
rounded-3xl p-8 text-white shadow-xl">


<h1 class="text-3xl font-bold">

Upload Research Dataset

</h1>


<p class="mt-2 text-teal-100">

Share valuable research data with the academic community.

</p>


</div>







@if($errors->any())

<div class="bg-red-100 border border-red-300
text-red-700 p-5 rounded-xl">


<ul class="list-disc ml-5">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>


</div>

@endif







{{-- Form --}}

<div class="dashboard-card p-8">


<form method="POST"
action="{{ route('datasets.store') }}"
enctype="multipart/form-data">


@csrf







{{-- Project --}}

<div class="mb-6">


<label class="block font-semibold mb-2">

Research Project

</label>


<select
name="project_id"
class="w-full rounded-xl"
required>


<option value="">

Select Research Project

</option>


@foreach($projects as $project)


<option value="{{ $project->id }}"
@selected(old('project_id')==$project->id)>


{{ $project->title }}


</option>


@endforeach


</select>


</div>








{{-- Dataset Name --}}

<div class="mb-6">


<label class="block font-semibold mb-2">

Dataset Name

</label>


<input
type="text"
name="dataset_name"
value="{{ old('dataset_name') }}"
placeholder="Example: Medical Image Dataset"
class="w-full rounded-xl"
required>


</div>









{{-- Description --}}

<div class="mb-6">


<label class="block font-semibold mb-2">

Dataset Description

</label>


<textarea
name="description"
rows="6"
placeholder="Describe your dataset..."
class="w-full rounded-xl"
required>{{ old('description') }}</textarea>


</div>








{{-- File Upload --}}

<div class="mb-8">


<label class="block font-semibold mb-3">

Upload Dataset File

</label>




<div class="border-2 border-dashed
rounded-2xl p-10 text-center">


<div class="text-6xl mb-4">

📊

</div>



<input
type="file"
name="file"
class="w-full"
required>



<p class="text-sm text-slate-500 mt-3">

Maximum file size: 50 MB

</p>



</div>



</div>









{{-- Buttons --}}

<div class="flex gap-4">


<button
type="submit"
class="px-8 py-3 rounded-xl
bg-teal-600 text-white font-semibold">


Upload Dataset


</button>





<a href="{{ route('datasets.index') }}"
class="px-8 py-3 rounded-xl
bg-slate-700 text-white">


Cancel


</a>



</div>





</form>


</div>





</div>


</x-app-layout>