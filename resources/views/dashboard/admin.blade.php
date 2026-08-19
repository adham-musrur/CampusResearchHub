<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Admin Dashboard
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Campus Research Hub Management
            </p>
        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-6">

                <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Welcome, {{ auth()->user()->name }} 👋
                </h3>

                <p class="text-gray-600 dark:text-gray-300 mt-2">
                    You are logged in as an administrator.
                    Manage research projects, papers, datasets and updates from here.
                </p>

            </div>


            {{-- Management Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- Projects --}}
                <a href="{{ route('projects.index') }}"
                   class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">

                    <div class="text-3xl mb-3">📁</div>

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                        Research Projects
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        View and manage research projects.
                    </p>

                </a>


                {{-- Papers --}}
                <a href="{{ route('papers.index') }}"
                   class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">

                    <div class="text-3xl mb-3">📄</div>

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                        Research Papers
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        View uploaded research papers.
                    </p>

                </a>


                {{-- Datasets --}}
                <a href="{{ route('datasets.index') }}"
                   class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">

                    <div class="text-3xl mb-3">🗂️</div>

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                        Datasets
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Manage research datasets.
                    </p>

                </a>


                {{-- Updates --}}
                <a href="{{ route('updates.index') }}"
                   class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">

                    <div class="text-3xl mb-3">📢</div>

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                        Research Updates
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Publish and manage research updates.
                    </p>

                </a>

            </div>


            {{-- Quick Actions --}}
            <div class="mt-8">

                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
                    Quick Actions
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <a href="{{ route('projects.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-5 py-3 text-center transition">
                        + Create Research Project
                    </a>

                    <a href="{{ route('papers.create') }}"
                       class="bg-green-600 hover:bg-green-700 text-white rounded-lg px-5 py-3 text-center transition">
                        + Upload Research Paper
                    </a>

                    <a href="{{ route('datasets.create') }}"
                       class="bg-purple-600 hover:bg-purple-700 text-white rounded-lg px-5 py-3 text-center transition">
                        + Upload Dataset
                    </a>

                </div>

            </div>


            {{-- System Information --}}
            <div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">

                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                    System Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-5">

                    <div>
                        <p class="text-sm text-gray-500">
                            Current Role
                        </p>

                        <p class="font-semibold text-gray-800 dark:text-white mt-1">
                            {{ ucfirst(auth()->user()->role) }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Account
                        </p>

                        <p class="font-semibold text-gray-800 dark:text-white mt-1">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Platform
                        </p>

                        <p class="font-semibold text-gray-800 dark:text-white mt-1">
                            Campus Research Hub
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>