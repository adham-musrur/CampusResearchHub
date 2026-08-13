<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Research Update
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto px-4">

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8">

                @if($update->image)

                    <img
                        src="{{ asset('storage/' . $update->image) }}"
                        alt="{{ $update->title }}"
                        class="w-full max-h-96 object-cover rounded-xl mb-6"
                    >

                @endif

                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                    {{ $update->title }}
                </h1>

                <div class="mt-3 text-sm text-gray-500">
                    Published by:
                    <strong>
                        {{ $update->publisher->name ?? 'Unknown' }}
                    </strong>

                    ·

                    {{ $update->created_at->format('d M Y, h:i A') }}
                </div>

                <div class="mt-8 text-gray-700 dark:text-gray-300 whitespace-pre-line leading-7">
                    {{ $update->description }}
                </div>

                <div class="mt-8 flex gap-3">

                    <a
                        href="{{ route('updates.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2.5 rounded-lg"
                    >
                        ← Back to Updates
                    </a>

                    <form
                        method="POST"
                        action="{{ route('updates.destroy', $update) }}"
                        onsubmit="return confirm('Delete this update?');"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-lg"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>