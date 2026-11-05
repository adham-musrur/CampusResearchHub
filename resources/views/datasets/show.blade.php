<x-app-layout>

<div class="max-w-6xl mx-auto space-y-8">



{{-- Header --}}

<div class="bg-gradient-to-r from-teal-700 to-cyan-600
rounded-3xl p-8 text-white shadow-xl">


<div class="flex flex-col md:flex-row
justify-between gap-5">


<div>


<div class="text-5xl mb-4">

📊

</div>


<h1 class="text-3xl md:text-4xl font-bold">

{{ $dataset->dataset_name }}

</h1>


<p class="mt-3 text-teal-100">

Research Dataset Details

</p>


</div>





<span class="self-start px-5 py-2 rounded-full
bg-white text-teal-700 font-semibold">


{{ strtoupper($dataset->file_type) }}


</span>



</div>


</div>









{{-- Information Cards --}}

<div class="grid md:grid-cols-3 gap-6">



<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Research Project

</p>


<h3 class="font-bold text-lg mt-2">

{{ $dataset->project->title ?? 'Unknown' }}

</h3>


</div>






<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Uploaded By

</p>


<h3 class="font-bold text-lg mt-2">

{{ $dataset->uploader->name ?? 'Unknown' }}

</h3>


</div>






<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Uploaded Date

</p>


<h3 class="font-bold text-lg mt-2">

{{ $dataset->created_at->format('d M Y') }}

</h3>


</div>




</div>








{{-- Description --}}

<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-4">

Dataset Description

</h2>


<p class="text-slate-600 leading-relaxed">

{{ $dataset->description }}

</p>


</div>









{{-- File Section --}}

<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-5">

Dataset File

</h2>



<div class="border-2 border-dashed rounded-2xl
p-10 text-center">


<div class="text-6xl mb-4">

📁

</div>


<p class="text-slate-500 mb-6">

Download the complete research dataset.

</p>



<a href="{{ route('datasets.download',$dataset) }}"
class="inline-flex px-8 py-3 rounded-xl
bg-teal-600 text-white font-semibold">


Download Dataset


</a>


</div>



</div>








{{-- Actions --}}

<div class="dashboard-card p-6 flex flex-wrap gap-4">



<a href="{{ route('datasets.download',$dataset) }}"
class="px-6 py-3 rounded-xl
bg-teal-600 text-white">


Download Dataset


</a>





<a href="{{ route('datasets.index') }}"
class="px-6 py-3 rounded-xl
bg-slate-700 text-white">


Back to Datasets


</a>



</div>






</div>


</x-app-layout>