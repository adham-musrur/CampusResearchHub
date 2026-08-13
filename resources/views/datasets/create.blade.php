<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Upload Dataset
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-4">

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Upload Research Dataset
                </h1>


                @if($errors->any())

                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg">

                        <ul class="list-disc ml-5">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif


                <form method="POST"
                      action="{{ route('datasets.store') }}"
                      enctype="multipart/form-data">

                    @csrf


                    <div class="mb-5">

                        <label class="block font-medium mb-2">
                            Research Project
                        </label>

                        <select name="project_id"
                                class="w-full border-gray-300 rounded-lg"
                                required>

                            <option value="">
                                Select Project
                            </option>

                            @foreach($projects as $project)

                                <option value="{{ $project->id }}"
                                    {{ old('project_id') == $project->id ? 'selected' : '' }}>

                                    {{ $project->title }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="mb-5">

                        <label class="block font-medium mb-2">
                            Dataset Name
                        </label>

                        <input type="text"
                               name="dataset_name"
                               value="{{ old('dataset_name') }}"
                               class="w-full border-gray-300 rounded-lg"
                               required>

                    </div>


                    <div class="mb-5">

                        <label class="block font-medium mb-2">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="w-full border-gray-300 rounded-lg"
                                  required>{{ old('description') }}</textarea>

                    </div>


                    <div class="mb-6">

                        <label class="block font-medium mb-2">
                            Dataset File
                        </label>

                        <input type="file"
                               name="file"
                               class="w-full border border-gray-300 rounded-lg p-2"
                               required>

                        <p class="text-sm text-gray-500 mt-1">
                            Maximum file size: 50 MB
                        </p>

                    </div>


                    <div class="flex gap-3">

                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg">
                            Upload Dataset
                        </button>


                        <a href="{{ route('datasets.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2.5 rounded-lg">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>