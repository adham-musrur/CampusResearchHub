<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                Research Datasets
            </h2>

            <a href="{{ route('datasets.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Upload Dataset
            </a>

        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4">

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif


            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-6">

                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Research Datasets
                </h1>

                <p class="text-gray-500 mt-1">
                    Browse and manage research datasets.
                </p>

            </div>
            {{-- Search and Filter --}}

<form method="GET"
action="{{ route('datasets.index') }}"
class="bg-white dark:bg-gray-800 shadow rounded-xl p-5 mb-6">


<div class="grid grid-cols-1 md:grid-cols-3 gap-4">


<input
type="text"
name="search"
value="{{ $search ?? '' }}"
placeholder="Search datasets..."
class="border rounded-lg px-3 py-2">



<select
name="file_type"
class="border rounded-lg px-3 py-2">


<option value="">
All File Types
</option>


@foreach($fileTypes as $type)

<option value="{{ $type }}"
@if(($fileType ?? '') == $type)
selected
@endif
>

{{ strtoupper($type) }}

</option>


@endforeach


</select>




<button
class="bg-blue-600 text-white rounded-lg px-4 py-2">

Search

</button>


</div>


</form>

            @if($datasets->count())

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($datasets as $dataset)

                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">

                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                                {{ $dataset->dataset_name }}
                            </h3>


                            <p class="text-sm text-gray-500 mb-3">
                                {{ Str::limit($dataset->description, 120) }}
                            </p>


                            @if($dataset->project)

                                <p class="text-sm mb-2">
                                    <strong>Project:</strong>
                                    {{ $dataset->project->title }}
                                </p>

                            @endif


                            <p class="text-sm text-gray-500 mb-2">
                                <strong>File type:</strong>
                                {{ strtoupper($dataset->file_type) }}
                            </p>


                            @if($dataset->uploader)

                                <p class="text-sm text-gray-500 mb-4">
                                    <strong>Uploaded by:</strong>
                                    {{ $dataset->uploader->name }}
                                </p>

                            @endif


                            <div class="flex flex-wrap gap-2">

                                <a href="{{ route('datasets.show', $dataset) }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm">
                                    View
                                </a>


                                <a href="{{ route('datasets.download', $dataset) }}"
                                   class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm">
                                    Download
                                </a>


                                <form method="POST"
                                      action="{{ route('datasets.destroy', $dataset) }}"
                                      onsubmit="return confirm('Delete this dataset?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-10 text-center">

                    <h3 class="text-xl font-semibold">
                        No datasets found
                    </h3>

                    <p class="text-gray-500 mt-2 mb-6">
                        Upload your first research dataset.
                    </p>

                    <a href="{{ route('datasets.create') }}"
                       class="bg-blue-600 text-white px-5 py-3 rounded-lg">
                        Upload Dataset
                    </a>

                </div>

            @endif

        </div>

    </div>
    <div class="mt-8">

{{ $datasets->links() }}

</div>


</x-app-layout>