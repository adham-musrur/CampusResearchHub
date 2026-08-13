<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Dataset Details
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto px-4">

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-8">

                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">
                    {{ $dataset->dataset_name }}
                </h1>


                <div class="space-y-4">

                    <div>
                        <strong>Project:</strong>

                        {{ $dataset->project->title ?? 'Unknown' }}
                    </div>


                    <div>
                        <strong>Description:</strong>

                        <p class="text-gray-600 mt-1">
                            {{ $dataset->description }}
                        </p>
                    </div>


                    <div>
                        <strong>File Type:</strong>

                        {{ strtoupper($dataset->file_type) }}
                    </div>


                    <div>
                        <strong>Uploaded By:</strong>

                        {{ $dataset->uploader->name ?? 'Unknown' }}
                    </div>


                    <div>
                        <strong>Uploaded:</strong>

                        {{ $dataset->created_at->format('d M Y') }}
                    </div>

                </div>


                <div class="flex gap-3 mt-8">

                    <a href="{{ route('datasets.download', $dataset) }}"
                       class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg">
                        Download Dataset
                    </a>


                    <a href="{{ route('datasets.index') }}"
                       class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2.5 rounded-lg">
                        Back to Datasets
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>