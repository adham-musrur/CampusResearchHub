<x-app-layout>

    <div class="max-w-6xl mx-auto mt-8">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                Research Projects
            </h2>

            <a href="{{ route('projects.create') }}"
               
               class="bg-green-600 text-white px-4 py-2 rounded">


                + Create Project

            </a>

        </div>

        @if(session('success'))

            <div class="bg-green-200 p-3 rounded mb-4">

                {{ session('success') }}

            </div>

        @endif


        @forelse($projects as $project)

            <div class="bg-white shadow rounded p-5 mb-4">

                <h3 class="text-xl font-bold">
    <a href="{{ route('projects.show', $project) }}"
       class="text-blue-600 hover:underline">

        {{ $project->title }}

    </a>
</h3>

                <p>

                    {{ $project->description }}

                </p>

                <p class="mt-2">

                    <strong>Department:</strong>

                    {{ $project->department }}

                </p>

                <p>

                    <strong>Research Area:</strong>

                    {{ $project->research_area }}

                </p>

                <p>

                    <strong>Status:</strong>

                    {{ $project->status }}

                </p>

                <p>

                    <strong>Deadline:</strong>

                    {{ $project->deadline }}

                </p>

            </div>

        @empty

            <div class="bg-yellow-100 p-4 rounded">

                No research projects found.

            </div>

        @endforelse

    </div>

</x-app-layout>