<x-app-layout>

<div class="max-w-6xl mx-auto space-y-8">



{{-- Header --}}

<div class="bg-gradient-to-r from-indigo-700 to-teal-600
rounded-3xl p-8 text-white shadow-xl">


<div class="flex flex-col md:flex-row
justify-between gap-5">


<div>


<div class="text-5xl mb-4">

📄

</div>


<h1 class="text-3xl md:text-4xl font-bold">

{{ $paper->title }}

</h1>


<p class="mt-3 text-indigo-100">

Academic Research Publication

</p>


</div>





<span class="self-start px-5 py-2 rounded-full
bg-white text-teal-700 font-semibold">


{{ $paper->category }}


</span>



</div>


</div>









{{-- Paper Information --}}

<div class="grid md:grid-cols-3 gap-6">



<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Author

</p>


<h3 class="font-bold text-lg mt-2">

{{ $paper->author->name ?? 'Unknown' }}

</h3>


</div>






<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Category

</p>


<h3 class="font-bold text-lg mt-2">

{{ $paper->category }}

</h3>


</div>






<div class="dashboard-card p-6">


<p class="text-sm text-slate-500">

Publication Date

</p>


<h3 class="font-bold text-lg mt-2">


{{ $paper->publication_date ?? 'Not specified' }}


</h3>


</div>




</div>









{{-- Abstract --}}

<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-5">

Research Abstract

</h2>


<p class="text-slate-600 leading-relaxed">

{{ $paper->abstract }}

</p>


</div>









{{-- PDF Preview Area --}}

<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-5">

Research Document

</h2>



<div class="border-2 border-dashed rounded-2xl
p-10 text-center">


<div class="text-6xl mb-4">

📑

</div>


<p class="text-slate-500 mb-5">

Download the complete research paper PDF.

</p>



<a href="{{ route('papers.download',$paper) }}"
class="inline-flex px-8 py-3 rounded-xl
bg-teal-600 text-white font-semibold">


Download PDF


</a>


</div>



</div>








{{-- Actions --}}

<div class="dashboard-card p-6
flex flex-wrap gap-4">



<a href="{{ route('papers.download',$paper) }}"
class="px-6 py-3 rounded-xl
bg-teal-600 text-white">


Download PDF

</a>





<form method="POST"
action="{{ route('papers.destroy',$paper) }}"
onsubmit="return confirm('Are you sure you want to delete this research paper?');">


@csrf

@method('DELETE')


<button
class="px-6 py-3 rounded-xl
bg-red-600 text-white">


Delete Paper


</button>


</form>






<a href="{{ route('papers.index') }}"
class="px-6 py-3 rounded-xl
bg-slate-700 text-white">


Back to Papers


</a>



</div>






</div>


</x-app-layout>