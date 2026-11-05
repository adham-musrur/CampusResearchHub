<x-app-layout>

<div class="max-w-5xl mx-auto space-y-8">



    {{-- Header --}}

    <div class="bg-gradient-to-r from-indigo-700 to-teal-600
    rounded-3xl p-8 text-white shadow-xl">


        <h1 class="text-3xl font-bold">

            Edit Research Project

        </h1>


        <p class="mt-2 text-indigo-100">

            Update project information, research details and status.

        </p>


    </div>







    {{-- Form --}}

    <div class="dashboard-card p-8">


        <form method="POST"
              action="{{ route('projects.update', $project) }}">


            @csrf

            @method('PUT')





            <div class="grid md:grid-cols-2 gap-6">



                {{-- Title --}}

                <div class="md:col-span-2">


                    <label class="block font-semibold mb-2">

                        Project Title

                    </label>


                    <input
                        type="text"
                        name="title"
                        value="{{ old('title',$project->title) }}"
                        class="w-full rounded-xl"
                        required>


                </div>







                {{-- Department --}}

                <div>


                    <label class="block font-semibold mb-2">

                        Department

                    </label>


                    <input
                        type="text"
                        name="department"
                        value="{{ old('department',$project->department) }}"
                        class="w-full rounded-xl"
                        required>


                </div>






                {{-- Research Area --}}

                <div>


                    <label class="block font-semibold mb-2">

                        Research Area

                    </label>


                    <input
                        type="text"
                        name="research_area"
                        value="{{ old('research_area',$project->research_area) }}"
                        class="w-full rounded-xl"
                        required>


                </div>







                {{-- Deadline --}}

                <div>


                    <label class="block font-semibold mb-2">

                        Deadline

                    </label>


                    <input
                        type="date"
                        name="deadline"
                        value="{{ old('deadline',$project->deadline) }}"
                        class="w-full rounded-xl"
                        required>


                </div>







                {{-- Status --}}

                <div>


                    <label class="block font-semibold mb-2">

                        Project Status

                    </label>



                    <select
                        name="status"
                        class="w-full rounded-xl"
                        required>


                        <option value="pending"
                        @selected(old('status',$project->status)=='pending')>

                            Pending

                        </option>



                        <option value="approved"
                        @selected(old('status',$project->status)=='approved')>

                            Approved

                        </option>




                        <option value="completed"
                        @selected(old('status',$project->status)=='completed')>

                            Completed

                        </option>


                    </select>


                </div>



            </div>







            {{-- Description --}}

            <div class="mt-6">


                <label class="block font-semibold mb-2">

                    Project Description

                </label>



                <textarea
                    name="description"
                    rows="6"
                    class="w-full rounded-xl"
                    required>{{ old('description',$project->description) }}</textarea>


            </div>








            {{-- Buttons --}}

            <div class="mt-8 flex gap-4">


                <button
                    type="submit"
                    class="px-8 py-3 rounded-xl
                    bg-teal-600 text-white
                    font-semibold">


                    Update Project


                </button>




                <a href="{{ route('projects.show',$project) }}"
                   class="px-8 py-3 rounded-xl
                   bg-slate-700 text-white">


                    Cancel


                </a>


            </div>




        </form>


    </div>



</div>


</x-app-layout>