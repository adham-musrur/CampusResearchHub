<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Student Dashboard
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Welcome back, {{ auth()->user()->name }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Projects</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $stats['projects'] }}
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Papers</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $stats['papers'] }}
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Datasets</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $stats['datasets'] }}
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Updates</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $stats['updates'] }}
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Discussions</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $stats['discussions'] }}
                    </p>
                </div>

            </div>

            {{-- Quick Actions --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Quick Actions
                </h3>

                <div class="flex flex-wrap gap-3">

                    <a href="{{ route('projects.create') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        + Create Project
                    </a>

                    <a href="{{ route('papers.create') }}"
                       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        + Upload Paper
                    </a>

                    <a href="{{ route('datasets.create') }}"
                       class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                        + Upload Dataset
                    </a>

                </div>

            </div>

            {{-- Recent Projects --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">

                <div class="flex justify-between items-center mb-4">

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Recent Research Projects
                    </h3>

                    <a href="{{ route('projects.index') }}"
                       class="text-blue-600 hover:underline">
                        View All
                    </a>

                </div>

                <div class="space-y-4">

                    @forelse($recentProjects as $project)

                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">

                            <a href="{{ route('projects.show', $project) }}"
                               class="font-semibold text-gray-900 dark:text-white hover:text-blue-600">
                                {{ $project->title }}
                            </a>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $project->department }}
                                •
                                {{ $project->research_area }}
                            </p>

                            <p class="text-sm text-gray-500">
                                Deadline: {{ $project->deadline }}
                            </p>

                        </div>

                    @empty

                        <p class="text-gray-500">
                            No research projects found.
                        </p>

                    @endforelse

                </div>

            </div>

            {{-- Recent Papers --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">

                <div class="flex justify-between items-center mb-4">

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Recent Research Papers
                    </h3>

                    <a href="{{ route('papers.index') }}"
                       class="text-blue-600 hover:underline">
                        View All
                    </a>

                </div>

                <div class="space-y-4">

                    @forelse($recentPapers as $paper)

                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">

                            <a href="{{ route('papers.show', $paper) }}"
                               class="font-semibold text-gray-900 dark:text-white hover:text-blue-600">
                                {{ $paper->title }}
                            </a>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $paper->category }}
                            </p>

                            @if($paper->author)
                                <p class="text-sm text-gray-500">
                                    Author: {{ $paper->author->name }}
                                </p>
                            @endif

                        </div>

                    @empty

                        <p class="text-gray-500">
                            No research papers found.
                        </p>

                    @endforelse

                </div>

            </div>

            {{-- Recent Updates --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Latest Research Updates
                </h3>

                <div class="space-y-4">

                    @forelse($recentUpdates as $update)

                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">

                            <a href="{{ route('updates.show', $update) }}"
                               class="font-semibold text-gray-900 dark:text-white hover:text-blue-600">
                                {{ $update->title }}
                            </a>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ Str::limit($update->description, 120) }}
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
    </div>

</x-app-layout>