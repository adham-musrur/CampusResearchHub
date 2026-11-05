<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Publish Research Update
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-4">

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

                @if($errors->any())

                    <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded-lg">

                        <ul class="list-disc ml-5">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                <form
                    method="POST"
                    action="{{ route('updates.store') }}"
                    enctype="multipart/form-data"
                >

                    @csrf

                    <div class="mb-5">

                        <label class="block font-medium text-gray-700 dark:text-gray-200 mb-2">
                            Update Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="w-full border-gray-300 rounded-lg"
                            placeholder="Enter update title"
                            required
                        >

                    </div>

                    <div class="mb-5">

                        <label class="block font-medium text-gray-700 dark:text-gray-200 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="8"
                            class="w-full border-gray-300 rounded-lg"
                            placeholder="Write your research update..."
                            required
                        >{{ old('description') }}</textarea>

                    </div>

                    <div class="mb-6">

                        <label class="block font-medium text-gray-700 dark:text-gray-200 mb-2">
                            Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            accept="image/jpeg,image/png,image/webp"
                            class="w-full border border-gray-300 rounded-lg p-2"
                        >

                        <p class="text-sm text-gray-500 mt-1">
                            Optional. Maximum size: 5MB.
                        </p>

                    </div>

                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg"
                        >
                            Publish Update
                        </button>

                        <a
                            href="{{ route('updates.index') }}"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2.5 rounded-lg"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>