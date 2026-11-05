<x-app-layout>

<div class="max-w-6xl mx-auto mt-8 px-4">


    {{-- Header --}}

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Research Projects
        </h2>


        <a href="{{ route('projects.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">

            + Create Project

        </a>


    </div>




    {{-- Success Message --}}

    @if(session('success'))

        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif





    {{-- Search and Filter --}}

    <form method="GET"
          action="{{ route('projects.index') }}"
          class="bg-white shadow rounded p-5 mb-6">


        <div class="flex flex-col md:flex-row gap-4 items-center">


            {{-- Search --}}

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Search projects..."
                class="border rounded px-3 py-2 w-full md:flex-1">





            {{-- Department --}}

            <select
                name="department"
                class="border rounded px-3 py-2 w-full md:w-1/4">


                <option value="">
                    All Departments
                </option>


                @foreach($departments as $dept)

                    <option value="{{ $dept }}"
                        @if(($department ?? '') == $dept)
                            selected
                        @endif
                    >

                        {{ $dept }}

                    </option>


                @endforeach


            </select>





            {{-- Status --}}

            <select
                name="status"
                class="border rounded px-3 py-2 w-full md:w-1/4">


                <option value="">
                    All Status
                </option>


                <option value="pending"
                    @if(($status ?? '') == 'pending')
                        selected
                    @endif
                >

                    Pending

                </option>


                <option value="approved"
                    @if(($status ?? '') == 'approved')
                        selected
                    @endif
                >

                    Approved

                </option>


                <option value="completed"
                    @if(($status ?? '') == 'completed')
                        selected
                    @endif
                >

                    Completed

                </option>


            </select>





            {{-- Search Button --}}

            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded w-full md:w-auto">

                Search

            </button>


        </div>


    </form>







    {{-- Projects List --}}


    @forelse($projects as $project)


        <div class="bg-white shadow rounded p-5 mb-4">


            <h3 class="text-xl font-bold">

                <a href="{{ route('projects.show', $project) }}"
                   class="text-blue-600 hover:underline">

                    {{ $project->title }}

                </a>


            </h3>




            <p class="mt-2">

                {{ $project->description }}

            </p>




            <p class="mt-3">

                <strong>Department:</strong>

                {{ $project->department }}

            </p>



            <p>

                <strong>Research Area:</strong>

                {{ $project->research_area }}

            </p>



            <p>

                <strong>Status:</strong>

                {{ ucfirst($project->status) }}

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







    {{-- Pagination --}}

    <div class="mt-6">

        {{ $projects->links() }}

    </div>



</div>


</x-app-layout>