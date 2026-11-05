<x-app-layout>

<div class="space-y-8">


    {{-- Welcome Header --}}

    <div class="bg-gradient-to-r from-teal-700 to-emerald-600
    rounded-3xl p-8 text-white shadow-xl">


        <h1 class="text-3xl font-bold">

            Welcome, {{ auth()->user()->name }} 👨‍🏫

        </h1>


        <p class="mt-2 text-emerald-100">

            Manage your research projects, publications and academic contributions.

        </p>


    </div>







    {{-- Statistics --}}

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📁
            </div>

            <p class="text-slate-500">
                Research Projects
            </p>

            <h2 class="text-3xl font-bold">
                {{ $stats['projects'] }}
            </h2>

        </div>





        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📄
            </div>

            <p class="text-slate-500">
                Published Papers
            </p>

            <h2 class="text-3xl font-bold">
                {{ $stats['papers'] }}
            </h2>

        </div>





        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📊
            </div>

            <p class="text-slate-500">
                Research Datasets
            </p>

            <h2 class="text-3xl font-bold">
                {{ $stats['datasets'] }}
            </h2>

        </div>


    </div>







    {{-- Quick Actions --}}

    <div class="dashboard-card p-8">


        <h2 class="text-xl font-bold mb-6">

            Research Actions

        </h2>



        <div class="grid md:grid-cols-3 gap-5">


            <a href="{{ route('projects.create') }}"
               class="p-6 rounded-2xl bg-teal-600
               text-white hover:bg-teal-700 transition">


                <div class="text-3xl mb-3">
                    ➕
                </div>


                Create Research Project


            </a>





            <a href="{{ route('papers.create') }}"
               class="p-6 rounded-2xl bg-slate-900
               text-white hover:bg-slate-800 transition">


                <div class="text-3xl mb-3">
                    📄
                </div>


                Upload Research Paper


            </a>





            <a href="{{ route('datasets.create') }}"
               class="p-6 rounded-2xl bg-cyan-600
               text-white hover:bg-cyan-700 transition">


                <div class="text-3xl mb-3">
                    📊
                </div>


                Upload Dataset


            </a>


        </div>


    </div>







    {{-- Faculty Projects --}}

    <div class="dashboard-card p-8">


        <div class="flex justify-between items-center mb-6">


            <h2 class="text-xl font-bold">

                My Research Projects

            </h2>


            <a href="{{ route('projects.index') }}"
               class="text-teal-600 font-semibold">

                View All →

            </a>


        </div>





        <div class="grid md:grid-cols-2 gap-5">


            @forelse($facultyProjects as $project)


            <div class="border rounded-xl p-5">


                <h3 class="font-bold text-lg">

                    {{ $project->title }}

                </h3>


                <p class="text-sm text-slate-500 mt-2">

                    {{ Str::limit($project->description,120) }}

                </p>



                <div class="mt-4 flex justify-between">


                    <span class="px-3 py-1 rounded-full
                    bg-teal-100 text-teal-700 text-sm">

                        {{ $project->status }}

                    </span>



                    <a href="{{ route('projects.show',$project) }}"
                       class="text-teal-600 font-semibold">

                        Open

                    </a>


                </div>


            </div>


            @empty


            <p class="text-slate-500">

                No research projects yet.

            </p>


            @endforelse


        </div>


    </div>







    {{-- Research Output --}}

    <div class="dashboard-card p-8">


        <h2 class="text-xl font-bold mb-6">

            Research Output

        </h2>


        <div class="grid md:grid-cols-2 gap-6">


            <div class="border rounded-xl p-5">


                <h3 class="font-semibold mb-2">

                    Recent Papers

                </h3>


                @forelse($facultyPapers as $paper)

                    <p class="text-sm mb-2">

                        📄 {{ $paper->title }}

                    </p>

                @empty

                    <p class="text-slate-500">
                        No papers uploaded.
                    </p>

                @endforelse


            </div>





            <div class="border rounded-xl p-5">


                <h3 class="font-semibold mb-2">

                    Recent Datasets

                </h3>


                @forelse($facultyDatasets as $dataset)

                    <p class="text-sm mb-2">

                        📊 {{ $dataset->dataset_name }}

                    </p>


                @empty

                    <p class="text-slate-500">
                        No datasets uploaded.
                    </p>

                @endforelse


            </div>


        </div>


    </div>



</div>


</x-app-layout>