<x-app-layout>

<div class="max-w-5xl mx-auto space-y-8">


    {{-- Header --}}

    <div class="bg-gradient-to-r from-teal-700 to-cyan-600
    rounded-3xl p-8 text-white shadow-xl">


        <h1 class="text-3xl font-bold">

            Create Research Project

        </h1>


        <p class="mt-2 text-teal-100">

            Submit a new academic research project and start collaboration.

        </p>


    </div>








    {{-- Form Card --}}

    <div class="dashboard-card p-8">


        <form action="{{ route('projects.store') }}"
              method="POST">

            @csrf





            <div class="grid md:grid-cols-2 gap-6">



                {{-- Title --}}

                <div class="md:col-span-2">

                    <label class="block font-semibold mb-2">

                        Project Title

                    </label>


                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Enter research project title"
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
                        value="{{ old('department') }}"
                        placeholder="Computer Science"
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
                        value="{{ old('research_area') }}"
                        placeholder="Artificial Intelligence"
                        class="w-full rounded-xl"
                        required>


                </div>







                {{-- Deadline --}}

                <div>


                    <label class="block font-semibold mb-2">

                        Research Deadline

                    </label>


                    <input
                        type="date"
                        name="deadline"
                        value="{{ old('deadline') }}"
                        class="w-full rounded-xl"
                        required>


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
                    placeholder="Describe your research objectives, methodology and expected outcomes..."
                    class="w-full rounded-xl"
                    required>{{ old('description') }}</textarea>



            </div>









            {{-- Action Buttons --}}


            <div class="mt-8 flex gap-4">


                <button
                    type="submit"
                    class="px-8 py-3 rounded-xl
                    bg-teal-600 text-white
                    font-semibold hover:bg-teal-700">


                    Create Project


                </button>





                <a href="{{ route('projects.index') }}"
                   class="px-8 py-3 rounded-xl
                   bg-slate-700 text-white">


                    Cancel


                </a>


            </div>





        </form>


    </div>





</div>


</x-app-layout>