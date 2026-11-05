<x-app-layout>

<div class="max-w-7xl mx-auto space-y-8">



{{-- Header --}}

<div class="bg-gradient-to-r from-indigo-700 to-teal-600
rounded-3xl p-8 text-white shadow-xl">


<div class="flex flex-col md:flex-row
justify-between gap-5">


<div>

<h1 class="text-3xl font-bold">

Research Papers

</h1>


<p class="mt-2 text-indigo-100">

Explore academic publications, articles and research documents.

</p>


</div>




<a href="{{ route('papers.create') }}"
class="px-6 py-3 rounded-xl
bg-white text-teal-700 font-semibold
hover:bg-slate-100">


+ Upload Paper


</a>



</div>


</div>






{{-- Success --}}

@if(session('success'))

<div class="bg-green-100 border border-green-300
text-green-700 px-5 py-4 rounded-xl">

{{ session('success') }}

</div>

@endif







{{-- Search --}}

<div class="dashboard-card p-6">


<form method="GET"
action="{{ route('papers.index') }}"
class="grid md:grid-cols-3 gap-4">


<input
type="text"
name="search"
value="{{ $search ?? '' }}"
placeholder="Search research papers..."
class="rounded-xl">





<select name="category"
class="rounded-xl">


<option value="">

All Categories

</option>


@foreach($categories as $cat)


<option value="{{ $cat }}"
@selected(($category ?? '')==$cat)>

{{ $cat }}

</option>


@endforeach


</select>




<button
class="rounded-xl bg-teal-600 text-white font-semibold">


Search Papers


</button>


</form>


</div>







{{-- Papers Grid --}}


@if($papers->count())


<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">


@foreach($papers as $paper)



<div class="dashboard-card p-6
hover:shadow-xl transition">



<div class="flex justify-between items-start">


<div class="text-4xl">

📄

</div>


<span class="px-3 py-1 rounded-full
bg-teal-100 text-teal-700 text-xs font-semibold">


{{ $paper->category }}


</span>


</div>






<h2 class="text-xl font-bold mt-5">


{{ $paper->title }}


</h2>





<p class="text-slate-500 text-sm mt-3">


{{ Str::limit($paper->abstract,150) }}


</p>






<div class="mt-5 space-y-2 text-sm">


<p>

👤

{{ $paper->author->name ?? 'Unknown' }}

</p>



@if($paper->publication_date)

<p>

📅

{{ $paper->publication_date }}

</p>

@endif



</div>








<div class="mt-6 space-y-3">



<a href="{{ route('papers.show',$paper) }}"
class="block text-center
px-4 py-3 rounded-xl
bg-slate-800 text-white">


View Paper


</a>





<a href="{{ route('papers.download',$paper) }}"
class="block text-center
px-4 py-3 rounded-xl
bg-teal-600 text-white">


Download PDF


</a>






<form method="POST"
action="{{ route('papers.destroy',$paper) }}"
onsubmit="return confirm('Delete this paper?');">


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


<h2 class="text-xl font-bold">

No Research Papers Found

</h2>


<p class="text-slate-500 mt-2">

Upload your first research paper.

</p>


</div>


@endif







<div class="mt-8">

{{ $papers->links() }}

</div>



</div>


</x-app-layout>