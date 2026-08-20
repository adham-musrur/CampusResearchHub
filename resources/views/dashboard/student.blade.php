<x-app-layout>


<x-slot name="header">

<div>

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
Student Dashboard
</h2>


<p class="text-sm text-gray-500 mt-1">
Welcome back, {{ auth()->user()->name }}
</p>


</div>

</x-slot>





<div class="py-8">

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



{{-- Statistics --}}

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">



<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

<p class="text-gray-500">
My Projects
</p>


<p class="text-3xl font-bold">
{{ $stats['projects'] }}
</p>


</div>





<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

<p class="text-gray-500">
Team Projects
</p>


<p class="text-3xl font-bold">
{{ $stats['team_projects'] }}
</p>


</div>





<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

<p class="text-gray-500">
Research Papers
</p>


<p class="text-3xl font-bold">
{{ $stats['papers'] }}
</p>


</div>





<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

<p class="text-gray-500">
Datasets
</p>


<p class="text-3xl font-bold">
{{ $stats['datasets'] }}
</p>


</div>



</div>






{{-- Quick Actions --}}

<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">


<h3 class="text-lg font-semibold mb-4">
Quick Actions
</h3>



<div class="flex flex-wrap gap-3">


<a href="{{ route('projects.create') }}"
class="px-4 py-2 bg-blue-600 text-white rounded-lg">

Create Project

</a>



<a href="{{ route('papers.create') }}"
class="px-4 py-2 bg-green-600 text-white rounded-lg">

Upload Paper

</a>




<a href="{{ route('datasets.create') }}"
class="px-4 py-2 bg-purple-600 text-white rounded-lg">

Upload Dataset

</a>



</div>


</div>






{{-- My Projects --}}

<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">


<h3 class="text-lg font-semibold mb-4">
My Research Projects
</h3>



@forelse($studentProjects as $project)


<div class="border-b pb-4 mb-4">


<a href="{{ route('projects.show',$project) }}"
class="font-semibold text-blue-600">

{{ $project->title }}

</a>


<p class="text-sm text-gray-500">

{{ $project->department }}

-
{{ $project->research_area }}

</p>


<p class="text-sm">

Status:
{{ $project->status }}

</p>


</div>


@empty

<p class="text-gray-500">
No projects created.
</p>


@endforelse


</div>







{{-- Team Projects --}}

<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">


<h3 class="text-lg font-semibold mb-4">
Joined Research Teams
</h3>



@forelse($memberProjects as $membership)


<div class="border-b pb-4 mb-4">


<a href="{{ route('projects.show',$membership->project) }}"
class="font-semibold text-blue-600">

{{ $membership->project->title }}

</a>


<p class="text-sm text-gray-500">

Your Role:
{{ $membership->member_role }}

</p>



</div>


@empty


<p class="text-gray-500">
No team projects.
</p>


@endforelse



</div>








{{-- Papers --}}

<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">


<h3 class="text-lg font-semibold mb-4">
My Research Papers
</h3>



@forelse($studentPapers as $paper)


<div class="border-b pb-4 mb-4">


<a href="{{ route('papers.show',$paper) }}"
class="font-semibold text-blue-600">

{{ $paper->title }}

</a>


</div>


@empty


<p class="text-gray-500">
No papers uploaded.
</p>


@endforelse



</div>







{{-- Datasets --}}

<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">


<h3 class="text-lg font-semibold mb-4">
My Datasets
</h3>



@forelse($studentDatasets as $dataset)


<div class="border-b pb-4 mb-4">


{{ $dataset->title }}


</div>


@empty


<p class="text-gray-500">
No datasets uploaded.
</p>


@endforelse


</div>








{{-- Updates --}}

<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">


<h3 class="text-lg font-semibold mb-4">
Latest Research Updates
</h3>



@forelse($recentUpdates as $update)


<div class="border-b pb-4 mb-4">


<a href="{{ route('updates.show',$update) }}"
class="font-semibold text-blue-600">

{{ $update->title }}

</a>


<p class="text-sm text-gray-500">

{{ Str::limit($update->description,120) }}

</p>


</div>


@empty


<p class="text-gray-500">
No updates available.
</p>


@endforelse



</div>




</div>

</div>


</x-app-layout>