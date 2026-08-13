<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Faculty Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">

                @foreach([
                    ['Projects', $stats['projects']],
                    ['Papers', $stats['papers']],
                    ['Datasets', $stats['datasets']],
                    ['Updates', $stats['updates']],
                    ['Discussions', $stats['discussions']]
                ] as $stat)

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

                        <p class="text-sm text-gray-500">
                            {{ $stat[0] }}
                        </p>

                        <p class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $stat[1] }}
                        </p>

                    </div>

                @endforeach

            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
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

                    <a href="{{ route('updates.create') }}"
                       class="px-4 py-2 bg-purple-600 text-white rounded-lg">
                        Post Update
                    </a>

                </div>

            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Recent Projects
                </h3>

                @forelse($recentProjects as $project)

                    <div class="border-b border-gray-200 dark:border-gray-700 py-4">

                        <a href="{{ route('projects.show', $project) }}"
                           class="font-semibold text-gray-900 dark:text-white hover:text-blue-600">
                            {{ $project->title }}
                        </a>

                        <p class="text-sm text-gray-500">
                            {{ $project->department }}
                            •
                            {{ $project->research_area }}
                        </p>

                    </div>

                @empty

                    <p class="text-gray-500">
                        No projects found.
                    </p>

                @endforelse

            </div>

        </div>
    </div>

</x-app-layout>