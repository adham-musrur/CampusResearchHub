<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                Research Papers
            </h2>

            <a href="{{ route('papers.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Upload Paper
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Page Header --}}
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6 mb-6">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div>
                        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                            Research Papers
                        </h1>

                        <p class="text-gray-500 dark:text-gray-400 mt-1">
                            Browse and manage research papers.
                        </p>
                    </div>

                    <div class="text-sm text-gray-500">
                        Total Papers:
                        <span class="font-bold">
                            {{ $papers->count() }}
                        </span>
                    </div>

                </div>

            </div>


            {{-- Papers --}}
            @if($papers->count() > 0)

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($papers as $paper)

                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">

                            <div class="p-6">

                                {{-- Title --}}
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                                    {{ $paper->title }}
                                </h3>


                                {{-- Category --}}
                                <div class="mb-3">
                                    <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $paper->category }}
                                    </span>
                                </div>


                                {{-- Abstract --}}
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                                    {{ Str::limit($paper->abstract, 150) }}
                                </p>


                                {{-- Author --}}
                                <p class="text-sm text-gray-500 mb-2">
                                    <strong>Author:</strong>

                                    {{ $paper->author->name ?? 'Unknown' }}
                                </p>


                                {{-- Publication Date --}}
                                @if($paper->publication_date)

                                    <p class="text-sm text-gray-500 mb-4">
                                        <strong>Published:</strong>
                                        {{ $paper->publication_date }}
                                    </p>

                                @endif


                                {{-- Buttons --}}
                                <div class="flex flex-wrap gap-2">

                                    {{-- View --}}
                                    <a href="{{ route('papers.show', $paper) }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm">
                                        View
                                    </a>


                                    {{-- Download --}}
                                    <a href="{{ route('papers.download', $paper) }}"
                                       class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm">
                                        Download
                                    </a>


                                    {{-- Delete --}}
                                    <form method="POST"
                                          action="{{ route('papers.destroy', $paper) }}"
                                          onsubmit="return confirm('Are you sure you want to delete this paper?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- Empty State --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-10 text-center">

                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                        No Research Papers Yet
                    </h3>

                    <p class="text-gray-500 mt-2 mb-6">
                        Upload your first research paper to get started.
                    </p>

                    <a href="{{ route('papers.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
                        Upload First Paper
                    </a>

                </div>

            @endif

        </div>
    </div>

</x-app-layout>