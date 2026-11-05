<x-app-layout>

<div class="max-w-6xl mx-auto space-y-8">



{{-- Project Header --}}

<div class="bg-gradient-to-r from-teal-700 to-cyan-600
rounded-3xl p-8 text-white shadow-xl">


<div class="flex items-center gap-4">


<div class="w-16 h-16 rounded-2xl
bg-white/20 flex items-center justify-center text-4xl">

💬

</div>



<div>

<h1 class="text-3xl font-bold">

{{ $project->title }}

</h1>


<p class="mt-1 text-teal-100">

Research Project Discussion

</p>


</div>


</div>


</div>







@if(session('success'))

<div class="bg-green-100 border border-green-300
text-green-700 px-5 py-4 rounded-xl">

{{ session('success') }}

</div>

@endif







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







{{-- New Message --}}

<div class="dashboard-card p-8">


<h2 class="text-2xl font-bold mb-5">

Start Discussion

</h2>



<form method="POST"
action="{{ route('projects.discussions.store',$project) }}">


@csrf



<textarea
name="message"
rows="5"
placeholder="Share your research thoughts..."
class="w-full rounded-xl"
required>{{ old('message') }}</textarea>





<button
class="mt-5 px-7 py-3 rounded-xl
bg-teal-600 text-white font-semibold">


Post Message


</button>



</form>


</div>









{{-- Discussion Timeline --}}


<div class="space-y-5">


@forelse($discussions as $discussion)



<div class="dashboard-card p-6">


<div class="flex justify-between items-start">


<div class="flex gap-4">


<div class="w-12 h-12 rounded-full
bg-teal-600 text-white
flex items-center justify-center
font-bold text-lg">


{{ strtoupper(substr($discussion->user->name ?? 'U',0,1)) }}


</div>





<div>


<h3 class="font-bold">

{{ $discussion->user->name ?? 'Unknown User' }}

</h3>


<p class="text-sm text-slate-500">

{{ $discussion->created_at->format('d M Y, h:i A') }}

</p>


</div>


</div>







@if(auth()->id()==$discussion->user_id)


<form method="POST"
action="{{ route('discussions.destroy',$discussion) }}"
onsubmit="return confirm('Delete this message?');">


@csrf

@method('DELETE')


<button
class="text-red-600 font-semibold text-sm">


Delete


</button>


</form>


@endif



</div>







<div class="mt-5 text-slate-600 whitespace-pre-line leading-relaxed">


{{ $discussion->message }}


</div>



</div>




@empty



<div class="dashboard-card p-10 text-center">


<div class="text-5xl mb-4">

💬

</div>


<h2 class="text-xl font-bold">

No Discussions Yet

</h2>


<p class="text-slate-500 mt-2">

Be the first person to start a research conversation.

</p>


</div>



@endforelse



</div>







<div>


<a href="{{ route('projects.show',$project) }}"
class="inline-flex px-6 py-3 rounded-xl
bg-slate-700 text-white">


← Back to Project


</a>


</div>





</div>


</x-app-layout>