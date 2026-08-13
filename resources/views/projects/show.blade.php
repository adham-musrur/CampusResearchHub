<x-app-layout>

    <div class="max-w-5xl mx-auto py-10 px-4">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Project Card --}}
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">

            {{-- Header --}}
            <div class="bg-gray-100 dark:bg-gray-700 px-6 py-5">

                <div class="flex justify-between items-start gap-4">

                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $project->title }}
                        </h1>

                        <p class="mt-2 text-gray-500 dark:text-gray-300">
                            Research Project
                        </p>
                    </div>

                    {{-- Status --}}
                    <div>
                        @if ($project->status === 'pending')

                            <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-800">
                                Pending
                            </span>

                        @elseif ($project->status === 'approved')

                            <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                                Approved
                            </span>

                        @elseif ($project->status === 'completed')

                            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-800">
                                Completed
                            </span>

                        @endif
                    </div>

                </div>

            </div>


            {{-- Project Information --}}
            <div class="p-6">

                {{-- Description --}}
                <div class="mb-8">

                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        Description
                    </h2>

                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        {{ $project->description }}
                    </p>

                </div>


                {{-- Information Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Department --}}
                    <div class="border rounded-lg p-4">

                        <p class="text-sm text-gray-500">
                            Department
                        </p>

                        <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $project->department }}
                        </p>

                    </div>


                    {{-- Research Area --}}
                    <div class="border rounded-lg p-4">

                        <p class="text-sm text-gray-500">
                            Research Area
                        </p>

                        <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $project->research_area }}
                        </p>

                    </div>


                    {{-- Deadline --}}
                    <div class="border rounded-lg p-4">

                        <p class="text-sm text-gray-500">
                            Deadline
                        </p>

                        <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $project->deadline }}
                        </p>

                    </div>


                    {{-- Created By --}}
                    <div class="border rounded-lg p-4">

                        <p class="text-sm text-gray-500">
                            Created By
                        </p>

                        <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">

                            @if ($project->user)
                                {{ $project->user->name }}
                            @else
                                Unknown
                            @endif

                        </p>

                    </div>

                </div>


                {{-- Action Buttons --}}
                <div class="mt-8 flex flex-wrap gap-3">

                    {{-- Edit --}}
                    <a
                        href="{{ route('projects.edit', $project) }}"
                        class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium"
                    >
                        Edit Project
                    </a>


                    {{-- Delete --}}
                    <form
                        method="POST"
                        action="{{ route('projects.destroy', $project) }}"
                        onsubmit="return confirm('Are you sure you want to delete this project?');"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium"
                        >
                            Delete Project
                        </button>

                    </form>


                    {{-- Back --}}
                    <a
                        href="{{ route('projects.index') }}"
                        class="px-5 py-2.5 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-medium"
                    >
                        Back to Projects
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>