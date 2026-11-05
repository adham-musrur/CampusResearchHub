<x-app-layout>

<div class="max-w-5xl mx-auto space-y-8">



{{-- Header --}}

<div class="bg-gradient-to-r from-teal-700 to-cyan-600
rounded-3xl p-8 text-white shadow-xl">


<h1 class="text-3xl font-bold">

Publish Research Update

</h1>


<p class="mt-2 text-teal-100">

Share announcements, achievements and research activities.

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







{{-- Form Card --}}

<div class="dashboard-card p-8">


<form method="POST"
action="{{ route('updates.store') }}"
enctype="multipart/form-data">


@csrf







{{-- Title --}}

<div class="mb-6">


<label class="block font-semibold mb-2">

Update Title

</label>


<input
type="text"
name="title"
value="{{ old('title') }}"
placeholder="Enter research update title"
class="w-full rounded-xl"
required>


</div>








{{-- Description --}}

<div class="mb-6">


<label class="block font-semibold mb-2">

Update Description

</label>


<textarea
name="description"
rows="8"
placeholder="Write your research update..."
class="w-full rounded-xl"
required>{{ old('description') }}</textarea>


</div>








{{-- Image --}}

<div class="mb-8">


<label class="block font-semibold mb-3">

Featured Image

</label>



<div class="border-2 border-dashed
rounded-2xl p-10 text-center">


<div class="text-6xl mb-4">

📰

</div>


<input
type="file"
name="image"
accept="image/jpeg,image/png,image/webp"
class="w-full">



<p class="text-sm text-slate-500 mt-3">

Optional image. Maximum size: 5MB.

</p>


</div>


</div>









{{-- Buttons --}}

<div class="flex gap-4">


<button
type="submit"
class="px-8 py-3 rounded-xl
bg-teal-600 text-white font-semibold">


Publish Update


</button>





<a href="{{ route('updates.index') }}"
class="px-8 py-3 rounded-xl
bg-slate-700 text-white">


Cancel


</a>


</div>





</form>


</div>




</div>


</x-app-layout>