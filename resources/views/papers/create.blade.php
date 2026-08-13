<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-4">

        <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6">

            <h1 class="text-3xl font-bold mb-6">
                Upload Research Paper
            </h1>

            <form
                method="POST"
                action="{{ route('papers.store') }}"
                enctype="multipart/form-data"
            >

                @csrf

                {{-- Title --}}
                <div class="mb-5">

                    <label class="block font-medium mb-2">
                        Paper Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="w-full border-gray-300 rounded-lg"
                        required
                    >

                    @error('title')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Abstract --}}
                <div class="mb-5">

                    <label class="block font-medium mb-2">
                        Abstract
                    </label>

                    <textarea
                        name="abstract"
                        rows="6"
                        class="w-full border-gray-300 rounded-lg"
                        required
                    >{{ old('abstract') }}</textarea>

                    @error('abstract')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Category --}}
                <div class="mb-5">

                    <label class="block font-medium mb-2">
                        Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ old('category') }}"
                        placeholder="Machine Learning"
                        class="w-full border-gray-300 rounded-lg"
                        required
                    >

                    @error('category')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Publication Date --}}
                <div class="mb-5">

                    <label class="block font-medium mb-2">
                        Publication Date
                    </label>

                    <input
                        type="date"
                        name="publication_date"
                        value="{{ old('publication_date') }}"
                        class="w-full border-gray-300 rounded-lg"
                    >

                    @error('publication_date')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- PDF --}}
                <div class="mb-6">

                    <label class="block font-medium mb-2">
                        Research Paper PDF
                    </label>

                    <input
                        type="file"
                        name="paper_file"
                        accept=".pdf"
                        class="w-full border border-gray-300 rounded-lg p-2"
                        required
                    >

                    <p class="text-sm text-gray-500 mt-1">
                        PDF only. Maximum size: 10 MB.
                    </p>

                    @error('paper_file')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Buttons --}}
                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg"
                    >
                        Upload Paper
                    </button>

                    <a
                        href="{{ route('papers.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2.5 rounded-lg"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>