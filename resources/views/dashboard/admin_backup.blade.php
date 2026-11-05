<x-app-layout>


<div class="space-y-8">


    {{-- Welcome Section --}}

    <div class="bg-gradient-to-r from-teal-700 to-cyan-600
    rounded-3xl p-8 text-white shadow-xl">


        <div class="flex justify-between items-center">


            <div>


                <h1 class="text-3xl font-bold">

                    Welcome, {{ auth()->user()->name }} 👋

                </h1>


                <p class="mt-2 text-teal-100">

                    Manage CampusResearchHub research activities,
                    users and resources.

                </p>


            </div>


            <div class="hidden md:block text-6xl">

                🎓

            </div>


        </div>


    </div>





    {{-- Statistics Cards --}}

    <div class="grid grid-cols-1 md:grid-cols-2
    lg:grid-cols-5 gap-6">


        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📁
            </div>

            <p class="text-sm text-slate-500">
                Projects
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $stats['projects'] }}
            </h2>

        </div>





        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📄
            </div>

            <p class="text-sm text-slate-500">
                Papers
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $stats['papers'] }}
            </h2>

        </div>





        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📊
            </div>

            <p class="text-sm text-slate-500">
                Datasets
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $stats['datasets'] }}
            </h2>

        </div>





        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                📝
            </div>

            <p class="text-sm text-slate-500">
                Updates
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $stats['updates'] }}
            </h2>

        </div>





        <div class="dashboard-card p-6">

            <div class="text-3xl mb-3">
                💬
            </div>

            <p class="text-sm text-slate-500">
                Discussions
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $stats['discussions'] }}
            </h2>

        </div>


    </div>






    {{-- Quick Actions --}}

    <div class="dashboard-card p-8">


        <h2 class="text-xl font-bold mb-6">

            Quick Actions

        </h2>



        <div class="grid md:grid-cols-3 gap-4">


            <a href="{{ route('projects.create') }}"
               class="rounded-xl bg-teal-600
               text-white p-5 hover:bg-teal-700 transition">


                <div class="text-3xl mb-2">

                    ➕

                </div>


                Create Project


            </a>





            <a href="{{ route('papers.create') }}"
               class="rounded-xl bg-slate-900
               text-white p-5 hover:bg-slate-800 transition">


                <div class="text-3xl mb-2">

                    📄

                </div>


                Upload Paper


            </a>





            <a href="{{ route('datasets.create') }}"
               class="rounded-xl bg-cyan-600
               text-white p-5 hover:bg-cyan-700 transition">


                <div class="text-3xl mb-2">

                    📊

                </div>


                Upload Dataset


            </a>


        </div>


    </div>





    {{-- System Information --}}

    <div class="dashboard-card p-8">


        <h2 class="text-xl font-bold mb-6">

            System Information

        </h2>


        <div class="grid md:grid-cols-3 gap-6">


            <div>

                <p class="text-sm text-slate-500">
                    Current Role
                </p>

                <p class="font-semibold text-teal-700">
                    {{ auth()->user()->role }}
                </p>

            </div>



            <div>

                <p class="text-sm text-slate-500">
                    Account
                </p>

                <p class="font-semibold">
                    {{ auth()->user()->email }}
                </p>

            </div>



            <div>

                <p class="text-sm text-slate-500">
                    Platform
                </p>

                <p class="font-semibold">
                    CampusResearchHub
                </p>

            </div>


        </div>


    </div>



</div>


</x-app-layout>