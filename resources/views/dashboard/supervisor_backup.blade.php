<x-app-layout>

<div class="space-y-8">


    {{-- Welcome Header --}}

    <div class="bg-gradient-to-r from-indigo-700 to-teal-600
    rounded-3xl p-8 text-white shadow-xl">


        <h1 class="text-3xl font-bold">

            Welcome, {{ auth()->user()->name }} 🎯

        </h1>


        <p class="mt-2 text-indigo-100">

            Monitor assigned research projects and guide your research teams.

        </p>


    </div>






    {{-- Statistics --}}

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📁
            </div>

            <p class="text-slate-500">

                Assigned Projects

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

                Total Members

            </p>

            <h2 class="text-3xl font-bold">

                {{ $stats['members'] }}

            </h2>

        </div>





        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📝
            </div>

            <p class="text-slate-500">

                Research Updates

            </p>

            <h2 class="text-3xl font-bold">

                {{ $stats['updates'] }}

            </h2>

        </div>


    </div>








    {{-- Assigned Projects --}}

    <div class="dashboard-card p-8">


        <div class="flex justify-between items-center mb-6">


            <h2 class="text-xl font-bold">

                Assigned Research Projects

            </h2>


            <a href="{{ route('projects.index') }}"
               class="text-teal-600 font-semibold">

                View All →

            </a>


        </div>





        <div class="space-y-5">


            @forelse($supervisedProjects as $item)


            <div class="border rounded-2xl p-6
            hover:shadow-md transition">


                <div class="flex justify-between
                items-start">


                    <div>


                        <h3 class="text-lg font-bold">

                            {{ $item->project->title }}

                        </h3>



                        <p class="text-sm text-slate-500 mt-2">

                            {{ Str::limit(
                                $item->project->description,
                                150
                            ) }}

                        </p>


                    </div>





                    <span
                    class="px-3 py-1 rounded-full
                    bg-indigo-100 text-indigo-700 text-sm">


                        Supervisor


                    </span>


                </div>





                <div class="mt-5 flex gap-4">


                    <a href="{{ route(
                        'projects.show',
                        $item->project
                    ) }}"
                    class="px-5 py-2 rounded-xl
                    bg-teal-600 text-white">


                        Open Project


                    </a>




                    <a href="{{ route(
                        'projects.discussions',
                        $item->project
                    ) }}"
                    class="px-5 py-2 rounded-xl
                    border border-teal-600
                    text-teal-600">


                        Discussion


                    </a>


                </div>


            </div>


            @empty


            <p class="text-slate-500">

                No assigned projects found.

            </p>


            @endforelse


        </div>


    </div>







    {{-- Supervisor Responsibilities --}}

    <div class="dashboard-card p-8">


        <h2 class="text-xl font-bold mb-6">

            Supervisor Responsibilities

        </h2>



        <div class="grid md:grid-cols-3 gap-5">


            <div class="border rounded-xl p-5">


                <div class="text-3xl mb-3">

                    👥

                </div>


                <h3 class="font-semibold">

                    Team Management

                </h3>


                <p class="text-sm text-slate-500 mt-2">

                    Monitor project members and collaboration.

                </p>


            </div>





            <div class="border rounded-xl p-5">


                <div class="text-3xl mb-3">

                    📊

                </div>


                <h3 class="font-semibold">

                    Research Progress

                </h3>


                <p class="text-sm text-slate-500 mt-2">

                    Track project activities and updates.

                </p>


            </div>





            <div class="border rounded-xl p-5">


                <div class="text-3xl mb-3">

                    💬

                </div>


                <h3 class="font-semibold">

                    Collaboration

                </h3>


                <p class="text-sm text-slate-500 mt-2">

                    Communicate with research teams.

                </p>


            </div>


        </div>


    </div>



</div>


</x-app-layout>