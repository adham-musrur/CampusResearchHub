<x-app-layout>


<x-slot name="header">

<div>

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
Supervisor Dashboard
</h2>


<p class="text-sm text-gray-500 mt-1">
Welcome back, {{ auth()->user()->name }}
</p>

</div>

</x-slot>





<div class="py-8">

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">





{{-- Statistics --}}

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">



<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

<p class="text-gray-500">
Supervised Projects
</p>


<p class="text-3xl font-bold">
{{ $stats['projects'] }}
</p>


</div>





<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

<p class="text-gray-500">
Team Members
</p>


<p class="text-3xl font-bold">
{{ $stats['members'] }}
</p>


</div>





<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

<p class="text-gray-500">
Research Updates
</p>


<p class="text-3xl font-bold">
{{ $stats['updates'] }}
</p>


</div>



</div>







{{-- Quick Actions --}}

<div class="flex flex-wrap gap-3">


<a href="{{ route('projects.index') }}"
class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow">

    View Projects

</a>



<a href="{{ route('updates.index') }}"
class="px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg shadow">

    Research Updates

</a>


</div>



</div>


</div>







{{-- Supervised Projects --}}

<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">


<div class="flex justify-between items-center mb-5">


<h3 class="text-lg font-semibold">
My Supervised Projects
</h3>



<a href="{{ route('projects.index') }}"
class="text-blue-600 hover:underline">

View All

</a>


</div>






@forelse($supervisedProjects as $membership)


<div class="border-b py-4">



<a href="{{ route('projects.show',$membership->project) }}"
class="font-semibold text-blue-600">

{{ $membership->project->title }}

</a>




<p class="text-sm text-gray-500">

Department:
{{ $membership->project->department }}

</p>



<p class="text-sm text-gray-500">

Research Area:
{{ $membership->project->research_area }}

</p>



<p class="text-sm text-gray-500">

Deadline:
{{ $membership->project->deadline }}

</p>




</div>




@empty


<p class="text-gray-500">

No supervised projects found.

</p>


@endforelse



</div>






</div>

</div>


</x-app-layout>