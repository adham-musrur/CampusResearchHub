<x-app-layout>

<div class="max-w-6xl mx-auto space-y-8">



{{-- Header --}}

<div class="bg-gradient-to-r from-teal-700 to-cyan-600
rounded-3xl p-8 text-white shadow-xl">


<div class="flex flex-col md:flex-row
justify-between gap-5">


<div>


<div class="text-5xl mb-4">

📰

</div>


<h1 class="text-3xl md:text-4xl font-bold">

{{ $update->title }}

</h1>


<p class="mt-3 text-teal-100">

Research Update

</p>


</div>




<div class="text-sm text-teal-100">


<p>

Published by:

<strong class="text-white">

{{ $update->publisher->name ?? 'Unknown' }}

</strong>

</p>


<p class="mt-2">

{{ $update->created_at->format('d M Y, h:i A') }}

</p>


</div>



</div>


</div>









{{-- Image --}}

@if($update->image)


<div class="dashboard-card overflow-hidden">


<img
src="{{ asset('storage/'.$update->image) }}"
alt="{{ $update->title }}"
class="w-full max-h-[500px] object-cover">


</div>


@endif







{{-- Content --}}

<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-5">

Update Details

</h2>


<p class="text-slate-600 leading-relaxed whitespace-pre-line">

{{ $update->description }}

</p>


</div>








{{-- Actions --}}

<div class="dashboard-card p-6 flex flex-wrap gap-4">


<a href="{{ route('updates.index') }}"
class="px-6 py-3 rounded-xl
bg-slate-700 text-white">


← Back to Updates


</a>






<form
method="POST"
action="{{ route('updates.destroy',$update) }}"
onsubmit="return confirm('Delete this update?');">


@csrf

@method('DELETE')


<button
class="px-6 py-3 rounded-xl
bg-red-600 text-white">


Delete Update


</button>


</form>



</div>




</div>


</x-app-layout>