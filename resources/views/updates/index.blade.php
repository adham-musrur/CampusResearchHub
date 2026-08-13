<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                Research Updates
            </h2>

            <a href="{{ route('updates.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + New Update
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4">

            @if(session('success'))
                <div class="mb-6 bg-green-100 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($updates->count())

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($updates as $update)

                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

                            @if($update->image)
                                <img
                                    src="{{ asset('storage/' . $update->image) }}"
                                    alt="{{ $update->title }}"
                                    class="w-full h-48 object-cover rounded-lg mb-4"
                                >
                            @endif

                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">
                                {{ $update->title }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-300 mt-3">
                                {{ Str::limit($update->description, 150) }}
                            </p>

                            <p class="text-sm text-gray-400 mt-4">
                                Published by:
                                {{ $update->publisher->name ?? 'Unknown' }}
                            </p>

                            <p class="text-sm text-gray-400 mt-1">
                                {{ $update->created_at->format('d M Y') }}
                            </p>

                            <div class="flex gap-2 mt-5">

                                <a
                                    href="{{ route('updates.show', $update) }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg"
                                >
                                    View
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('updates.destroy', $update) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this update?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg"
                                    >
                                        Delete
                                    </button>
                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-10 text-center">

                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                        No research updates yet
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Publish your first research update.
                    </p>

                    <a
                        href="{{ route('updates.create') }}"
                        class="inline-block mt-5 bg-blue-600 text-white px-5 py-2 rounded-lg"
                    >
                        Create Update
                    </a>

                </div>

            @endif

        </div>
    </div>

</x-app-layout>