<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Project Discussions
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto px-4">

            <!-- Project Header -->

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-6">

                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    {{ $project->title }}
                </h1>

                <p class="text-gray-500 mt-1">
                    Project Discussion
                </p>

            </div>


            @if(session('success'))

                <div class="mb-6 bg-green-100 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif


            @if($errors->any())

                <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded-lg">

                    <ul class="list-disc ml-5">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- New Discussion -->

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-6">

                <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
                    Start a Discussion
                </h2>

                <form
                    method="POST"
                    action="{{ route('projects.discussions.store', $project) }}"
                >

                    @csrf

                    <textarea
                        name="message"
                        rows="4"
                        class="w-full border-gray-300 rounded-lg"
                        placeholder="Write your message..."
                        required
                    >{{ old('message') }}</textarea>

                    <button
                        type="submit"
                        class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg"
                    >
                        Post Message
                    </button>

                </form>

            </div>


            <!-- Discussions -->

            <div class="space-y-4">

                @forelse($discussions as $discussion)

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

                        <div class="flex justify-between items-start">

                            <div>

                                <div class="font-semibold text-gray-800 dark:text-white">
                                    {{ $discussion->user->name ?? 'Unknown User' }}
                                </div>

                                <div class="text-sm text-gray-400">
                                    {{ $discussion->created_at->format('d M Y, h:i A') }}
                                </div>

                            </div>

                            @if(auth()->id() === $discussion->user_id)

                                <form
                                    method="POST"
                                    action="{{ route('discussions.destroy', $discussion) }}"
                                    onsubmit="return confirm('Delete this message?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-600 hover:text-red-800 text-sm"
                                    >
                                        Delete
                                    </button>

                                </form>

                            @endif

                        </div>

                        <div class="mt-4 text-gray-700 dark:text-gray-300 whitespace-pre-line">
                            {{ $discussion->message }}
                        </div>

                    </div>

                @empty

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8 text-center">

                        <p class="text-gray-500">
                            No discussions yet.
                        </p>

                        <p class="text-sm text-gray-400 mt-1">
                            Be the first person to start a discussion.
                        </p>

                    </div>

                @endforelse

            </div>


            <!-- Back -->

            <div class="mt-6">

                <a
                    href="{{ route('projects.show', $project) }}"
                    class="text-blue-600 hover:underline"
                >
                    ← Back to Project
                </a>

            </div>

        </div>

    </div>

</x-app-layout>