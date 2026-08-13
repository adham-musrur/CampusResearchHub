<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-4">

        <div class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden">

            {{-- Header --}}
            <div class="bg-gray-100 dark:bg-gray-700 p-6">

                <h1 class="text-3xl font-bold">
                    {{ $paper->title }}
                </h1>

                <p class="mt-2 text-gray-600 dark:text-gray-300">
                    Research Paper
                </p>

            </div>


            {{-- Content --}}
            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                    <div>
                        <p class="text-sm text-gray-500">
                            Category
                        </p>

                        <p class="font-semibold">
                            {{ $paper->category }}
                        </p>
                    </div>


                    <div>
                        <p class="text-sm text-gray-500">
                            Author
                        </p>

                        <p class="font-semibold">

                            @if ($paper->author)
                                {{ $paper->author->name }}
                            @else
                                Unknown
                            @endif

                        </p>
                    </div>


                    <div>
                        <p class="text-sm text-gray-500">
                            Publication Date
                        </p>

                        <p class="font-semibold">
                            {{ $paper->publication_date ?? 'Not specified' }}
                        </p>
                    </div>

                </div>


                {{-- Abstract --}}
                <div class="mb-8">

                    <h2 class="text-xl font-bold mb-3">
                        Abstract
                    </h2>

                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        {{ $paper->abstract }}
                    </p>

                </div>


                {{-- Actions --}}
                <div class="flex flex-wrap gap-3">

                    <a
                        href="{{ route('papers.download', $paper) }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg"
                    >
                        Download PDF
                    </a>


                    <form
                        method="POST"
                        action="{{ route('papers.destroy', $paper) }}"
                        onsubmit="return confirm('Are you sure you want to delete this research paper?');"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-lg"
                        >
                            Delete Paper
                        </button>

                    </form>


                    <a
                        href="{{ route('papers.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2.5 rounded-lg"
                    >
                        Back to Papers
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>