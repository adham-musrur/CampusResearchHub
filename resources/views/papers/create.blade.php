<x-app-layout>

<div class="max-w-5xl mx-auto space-y-8">


    {{-- Header --}}

    <div class="bg-gradient-to-r from-indigo-700 to-teal-600
    rounded-3xl p-8 text-white shadow-xl">


        <h1 class="text-3xl font-bold">

            Upload Research Paper

        </h1>


        <p class="mt-2 text-indigo-100">

            Share academic publications with the research community.

        </p>


    </div>







    {{-- Upload Form --}}

    <div class="dashboard-card p-8">


        <form
            method="POST"
            action="{{ route('papers.store') }}"
            enctype="multipart/form-data">


            @csrf





            <div class="grid md:grid-cols-2 gap-6">





                {{-- Title --}}

                <div class="md:col-span-2">


                    <label class="block font-semibold mb-2">

                        Paper Title

                    </label>


                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Enter research paper title"
                        class="w-full rounded-xl"
                        required>



                    @error('title')

                    <p class="text-red-600 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror


                </div>








                {{-- Category --}}

                <div>


                    <label class="block font-semibold mb-2">

                        Research Category

                    </label>


                    <input
                        type="text"
                        name="category"
                        value="{{ old('category') }}"
                        placeholder="Artificial Intelligence"
                        class="w-full rounded-xl"
                        required>



                    @error('category')

                    <p class="text-red-600 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror


                </div>







                {{-- Date --}}

                <div>


                    <label class="block font-semibold mb-2">

                        Publication Date

                    </label>


                    <input
                        type="date"
                        name="publication_date"
                        value="{{ old('publication_date') }}"
                        class="w-full rounded-xl">



                    @error('publication_date')

                    <p class="text-red-600 text-sm mt-2">

                        {{ $message }}

                    </p>

                    @enderror


                </div>



            </div>








            {{-- Abstract --}}

            <div class="mt-6">


                <label class="block font-semibold mb-2">

                    Research Abstract

                </label>



                <textarea
                    name="abstract"
                    rows="7"
                    placeholder="Write a summary of your research..."
                    class="w-full rounded-xl"
                    required>{{ old('abstract') }}</textarea>



                @error('abstract')

                <p class="text-red-600 text-sm mt-2">

                    {{ $message }}

                </p>

                @enderror



            </div>








            {{-- File Upload --}}

            <div class="mt-6">


                <label class="block font-semibold mb-2">

                    Upload PDF File

                </label>




                <div class="border-2 border-dashed
                rounded-2xl p-8 text-center">


                    <div class="text-5xl mb-4">

                        📄

                    </div>


                    <input
                        type="file"
                        name="paper_file"
                        accept=".pdf"
                        class="w-full"
                        required>



                    <p class="text-sm text-slate-500 mt-3">

                        PDF format only. Maximum size: 10 MB.

                    </p>



                </div>




                @error('paper_file')

                <p class="text-red-600 text-sm mt-2">

                    {{ $message }}

                </p>

                @enderror


            </div>









            {{-- Buttons --}}

            <div class="mt-8 flex gap-4">


                <button
                    type="submit"
                    class="px-8 py-3 rounded-xl
                    bg-teal-600 text-white font-semibold">


                    Upload Paper


                </button>





                <a href="{{ route('papers.index') }}"
                   class="px-8 py-3 rounded-xl
                   bg-slate-700 text-white">


                    Cancel


                </a>


            </div>





        </form>


    </div>



</div>


</x-app-layout>