<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                Research Papers
            </h2>


            <a href="{{ route('papers.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

                + Upload Paper

            </a>


        </div>

    </x-slot>



    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">



            {{-- Success Message --}}

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">

                    {{ session('success') }}

                </div>

            @endif






            {{-- Page Header --}}

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6 mb-6">


                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">

                    Research Papers

                </h1>


                <p class="text-gray-500 mt-1">

                    Browse and manage research papers.

                </p>


            </div>







            {{-- Search and Filter --}}

            <form method="GET"
                  action="{{ route('papers.index') }}"
                  class="bg-white dark:bg-gray-800 shadow rounded-xl p-5 mb-6">


                <div class="flex flex-col md:flex-row gap-4 items-center">



                    <input

                        type="text"

                        name="search"

                        value="{{ $search ?? '' }}"

                        placeholder="Search papers..."

                        class="border rounded-lg px-3 py-2 w-full md:flex-1"

                    >





                    <select

                        name="category"

                        class="border rounded-lg px-3 py-2 w-full md:w-1/3"

                    >


                        <option value="">
                            All Categories
                        </option>



                        @foreach($categories as $cat)


                            <option value="{{ $cat }}"

                            @if(($category ?? '') == $cat)
                                selected
                            @endif

                            >

                                {{ $cat }}

                            </option>


                        @endforeach


                    </select>





                    <button

                        class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-5 py-2 w-full md:w-auto"

                    >

                        Search


                    </button>



                </div>


            </form>








            {{-- Papers --}}

            @if($papers->count() > 0)


                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">



                    @foreach($papers as $paper)



                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 overflow-hidden w-full">


                            <div class="p-6">



                                {{-- Title --}}

                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">

                                    {{ $paper->title }}

                                </h3>





                                {{-- Category --}}

                                <div class="mb-4">


                                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">

                                        {{ $paper->category }}

                                    </span>


                                </div>






                                {{-- Abstract --}}

                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-5">

                                    {{ Str::limit($paper->abstract,150) }}

                                </p>






                                {{-- Author --}}

                                <p class="text-sm text-gray-500 mb-3">

                                    <strong>
                                        Author:
                                    </strong>


                                    {{ $paper->author->name ?? 'Unknown' }}

                                </p>






                                {{-- Date --}}

                                @if($paper->publication_date)


                                    <p class="text-sm text-gray-500 mb-5">


                                        <strong>
                                            Published:
                                        </strong>


                                        {{ $paper->publication_date }}


                                    </p>


                                @endif







                                {{-- Buttons --}}

                                <div class="flex flex-col gap-3 mt-5">



                                    {{-- View --}}

                                    <a href="{{ route('papers.show',$paper) }}"

                                       class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg">

                                        View

                                    </a>







                                    {{-- Download --}}

                                    <a href="{{ route('papers.download',$paper) }}"

                                       class="w-full text-center bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg">

                                        Download

                                    </a>








                                    {{-- Delete --}}


                                    <form method="POST"

                                          action="{{ route('papers.destroy',$paper) }}"

                                          onsubmit="return confirm('Delete this paper?');">


                                        @csrf

                                        @method('DELETE')



                                        <button

                                            type="submit"

                                            class="w-full bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">

                                            Delete


                                        </button>



                                    </form>



                                </div>




                            </div>


                        </div>





                    @endforeach



                </div>





            @else



                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-10 text-center">


                    <h3 class="text-xl font-semibold">

                        No Research Papers Yet

                    </h3>


                    <p class="text-gray-500 mt-2">

                        Upload your first research paper.

                    </p>



                </div>



            @endif






            {{-- Pagination --}}

            <div class="mt-8 flex justify-center">

                {{ $papers->links() }}

            </div>





        </div>

    </div>


</x-app-layout>