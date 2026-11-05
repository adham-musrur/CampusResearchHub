<x-app-layout>


<div class="space-y-8">


    {{-- Welcome Header --}}

    <div class="bg-gradient-to-r from-cyan-600 to-teal-700
    rounded-3xl p-8 text-white shadow-xl">


        <h1 class="text-3xl font-bold">
            Welcome, {{ auth()->user()->name }} 👋
        </h1>


        <p class="mt-2 text-cyan-100">
            Continue your research journey and collaborate with your team.
        </p>


    </div>





    {{-- Statistics --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">


        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📁
            </div>

            <p class="text-slate-500">
                My Projects
            </p>

            <h2 class="text-3xl font-bold">
                {{ $stats['projects'] }}
            </h2>

        </div>





        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                👥
            </div>

            <p class="text-slate-500">
                Team Projects
            </p>

            <h2 class="text-3xl font-bold">
                {{ $stats['team_projects'] }}
            </h2>

        </div>





        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📄
            </div>

            <p class="text-slate-500">
                Research Papers
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
                Datasets
            </p>

            <h2 class="text-3xl font-bold">
                {{ $stats['datasets'] }}
            </h2>

        </div>


    </div>






    {{-- My Projects --}}

    <div class="dashboard-card p-8">


        <div class="flex justify-between items-center mb-6">

            <h2 class="text-xl font-bold">
                My Research Projects
            </h2>


            <a href="{{ route('projects.create') }}"
               class="px-5 py-2 rounded-xl bg-teal-600
               text-white hover:bg-teal-700">

                + New Project

            </a>


        </div>




        <div class="grid md:grid-cols-2 gap-5">


            @forelse($studentProjects as $project)


            <div class="border rounded-xl p-5">


                <h3 class="font-bold text-lg">

                    {{ $project->title }}

                </h3>


                <p class="text-sm text-slate-500 mt-2">

                    {{ Str::limit($project->description,120) }}

                </p>



                <div class="mt-4">

                    <span class="px-3 py-1 rounded-full
                    bg-teal-100 text-teal-700 text-sm">

                        {{ $project->status }}

                    </span>

                </div>


            </div>


            @empty


            <p class="text-slate-500">
                No projects created yet.
            </p>


            @endforelse


        </div>


    </div>







    {{-- Joined Projects --}}

    <div class="dashboard-card p-8">


        <h2 class="text-xl font-bold mb-6">

            Collaboration Projects

        </h2>



        <div class="space-y-4">


            @forelse($memberProjects as $member)


            <div class="border rounded-xl p-5 flex justify-between">


                <div>

                    <h3 class="font-semibold">

                        {{ $member->project->title }}

                    </h3>


                    <p class="text-sm text-slate-500">

                        Role:
                        {{ $member->member_role }}

                    </p>

                </div>



                <a href="{{ route('projects.show',$member->project) }}"
                   class="text-teal-600 font-semibold">

                    View →

                </a>


            </div>


            @empty


            <p class="text-slate-500">
                No collaboration projects.
            </p>


            @endforelse


        </div>


    </div>







    {{-- Recent Updates --}}

    <div class="dashboard-card p-8">


        <h2 class="text-xl font-bold mb-6">

            Latest Research Updates

        </h2>



        <div class="space-y-4">


        @foreach($recentUpdates as $update)


            <div class="border-b pb-4">


                <h3 class="font-semibold">

                    {{ $update->title }}

                </h3>


                <p class="text-sm text-slate-500">

                    {{ Str::limit($update->description,100) }}

                </p>


            </div>


        @endforeach


        </div>


    </div>



</div>


</x-app-layout>