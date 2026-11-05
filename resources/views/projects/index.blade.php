<x-app-layout>

<div class="space-y-8">


    {{-- Header --}}

    <div class="flex flex-col md:flex-row
    justify-between md:items-center gap-4">


        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Research Projects

            </h1>


            <p class="text-slate-500 mt-2">

                Explore and manage academic research projects.

            </p>


        </div>



        @if(in_array(auth()->user()->role,
            ['faculty','supervisor','admin']))


        <a href="{{ route('projects.create') }}"
           class="px-6 py-3 rounded-xl
           bg-teal-600 text-white
           hover:bg-teal-700 transition">


            + Create Project


        </a>


        @endif


    </div>







    {{-- Search and Filters --}}

    <div class="dashboard-card p-6">


        <form method="GET"
              action="{{ route('projects.index') }}"
              class="grid md:grid-cols-4 gap-4">


            <input
                type="text"
                name="search"
                value="{{ $search }}"
                placeholder="Search projects..."
                class="rounded-xl">


            <select name="department"
                    class="rounded-xl">


                <option value="">
                    All Departments
                </option>


                @foreach($departments as $item)

                    <option value="{{ $item }}"
                    @selected($department == $item)>

                        {{ $item }}

                    </option>

                @endforeach


            </select>




            <select name="status"
                    class="rounded-xl">


                <option value="">
                    All Status
                </option>


                <option value="pending"
                @selected($status=='pending')>
                    Pending
                </option>


                <option value="approved"
                @selected($status=='approved')>
                    Approved
                </option>


                <option value="completed"
                @selected($status=='completed')>
                    Completed
                </option>


            </select>




            <button
                class="rounded-xl bg-teal-600
                text-white font-semibold">


                Search


            </button>


        </form>


    </div>







    {{-- Project Cards --}}


    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">


        @forelse($projects as $project)



        <div class="dashboard-card p-6
        hover:shadow-xl transition">



            <div class="flex justify-between">


                <span
                class="px-3 py-1 rounded-full
                text-sm bg-teal-100 text-teal-700">

                    {{ $project->status }}

                </span>


            </div>





            <h2 class="text-xl font-bold mt-5">


                {{ $project->title }}


            </h2>




            <p class="text-slate-500 mt-3 text-sm">


                {{ Str::limit(
                    $project->description,
                    130
                ) }}


            </p>






            <div class="mt-5 space-y-2 text-sm">


                <p>

                    🏛
                    {{ $project->department }}

                </p>



                <p>

                    🔬
                    {{ $project->research_area }}

                </p>



                <p>

                    👤
                    {{ $project->user->name }}

                </p>


            </div>






            <div class="mt-6">


                <a href="{{ route(
                    'projects.show',
                    $project
                ) }}"
                class="block text-center
                rounded-xl bg-slate-900
                text-white py-3">


                    View Project


                </a>


            </div>



        </div>



        @empty


        <div class="col-span-full
        dashboard-card p-10 text-center">


            <p class="text-slate-500">

                No research projects found.

            </p>


        </div>


        @endforelse


    </div>






    {{-- Pagination --}}

    <div>

        {{ $projects->links() }}

    </div>



</div>


</x-app-layout>