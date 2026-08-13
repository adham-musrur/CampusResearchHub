<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Admin Dashboard
            </h2>

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Welcome, {{ auth()->user()->name }}
            </span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                {{-- Users --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Total Users
                    </p>

                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-2">
                        {{ \App\Models\User::count() }}
                    </h3>

                    <a href="{{ route('profile.edit') }}"
                       class="inline-block mt-4 text-sm text-indigo-600 hover:text-indigo-800">
                        Manage Users →
                    </a>
                </div>

                {{-- Projects --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Research Projects
                    </p>

                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-2">
                        {{ \App\Models\ResearchProject::count() }}
                    </h3>

                    <a href="{{ route('projects.index') }}"
                       class="inline-block mt-4 text-sm text-indigo-600 hover:text-indigo-800">
                        View Projects →
                    </a>
                </div>

                {{-- Papers --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Research Papers
                    </p>

                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-2">
                        {{ \App\Models\ResearchPaper::count() }}
                    </h3>

                    <a href="{{ route('papers.index') }}"
                       class="inline-block mt-4 text-sm text-indigo-600 hover:text-indigo-800">
                        View Papers →
                    </a>
                </div>

                {{-- Datasets --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Datasets
                    </p>

                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-2">
                        {{ \App\Models\Dataset::count() }}
                    </h3>

                    <a href="{{ route('datasets.index') }}"
                       class="inline-block mt-4 text-sm text-indigo-600 hover:text-indigo-800">
                        View Datasets →
                    </a>
                </div>

                {{-- Updates --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Research Updates
                    </p>

                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-2">
                        {{ \App\Models\ResearchUpdate::count() }}
                    </h3>

                    <a href="{{ route('updates.index') }}"
                       class="inline-block mt-4 text-sm text-indigo-600 hover:text-indigo-800">
                        View Updates →
                    </a>
                </div>

                {{-- Discussions --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Discussions
                    </p>

                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-2">
                        {{ \App\Models\Discussion::count() }}
                    </h3>

                    <span class="inline-block mt-4 text-sm text-gray-500">
                        Project discussions
                    </span>
                </div>

            </div>

            {{-- Quick Actions --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow mb-8">

                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                        Quick Actions
                    </h3>
                </div>

                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    <a href="{{ route('projects.create') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white text-center px-4 py-3 rounded-lg">
                        + Create Project
                    </a>

                    <a href="{{ route('papers.create') }}"
                       class="bg-green-600 hover:bg-green-700 text-white text-center px-4 py-3 rounded-lg">
                        + Upload Paper
                    </a>

                    <a href="{{ route('datasets.create') }}"
                       class="bg-purple-600 hover:bg-purple-700 text-white text-center px-4 py-3 rounded-lg">
                        + Upload Dataset
                    </a>

                    <a href="{{ route('updates.create') }}"
                       class="bg-orange-600 hover:bg-orange-700 text-white text-center px-4 py-3 rounded-lg">
                        + Create Update
                    </a>

                </div>

            </div>

            {{-- Recent Projects --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">

                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">

                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Recent Research Projects
                        </h3>

                        <a href="{{ route('projects.index') }}"
                           class="text-sm text-indigo-600 hover:text-indigo-800">
                            View All
                        </a>

                    </div>
                </div>

                <div class="divide-y divide-gray-200 dark:divide-gray-700">

                    @forelse(
                        \App\Models\ResearchProject::latest()->take(5)->get()
                        as $project
                    )

                        <div class="p-6 flex items-center justify-between">

                            <div>
                                <h4 class="font-semibold text-gray-800 dark:text-white">
                                    {{ $project->title }}
                                </h4>

                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $project->department }}
                                    ·
                                    {{ $project->research_area }}
                                </p>
                            </div>

                            <a href="{{ route('projects.show', $project) }}"
                               class="text-sm text-indigo-600 hover:text-indigo-800">
                                View →
                            </a>

                        </div>

                    @empty

                        <div class="p-6 text-gray-500 dark:text-gray-400">
                            No research projects available.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>
    </div>

</x-app-layout>