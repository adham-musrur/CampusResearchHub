<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manage Users') }}
            </h2>

            <a
                href="{{ route('admin.users.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
            >
                + Add User
            </a>
        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success message --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error message --}}
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">

                <div class="p-6">

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        All Users
                    </h3>

                    <div class="overflow-x-auto">

                        <table class="w-full text-left">

                            <thead class="border-b border-gray-200 dark:border-gray-700">

                                <tr>

                                    <th class="px-4 py-3 text-sm font-semibold text-gray-600 dark:text-gray-300">
                                        ID
                                    </th>

                                    <th class="px-4 py-3 text-sm font-semibold text-gray-600 dark:text-gray-300">
                                        Name
                                    </th>

                                    <th class="px-4 py-3 text-sm font-semibold text-gray-600 dark:text-gray-300">
                                        Email
                                    </th>

                                    <th class="px-4 py-3 text-sm font-semibold text-gray-600 dark:text-gray-300">
                                        Role
                                    </th>

                                    <th class="px-4 py-3 text-sm font-semibold text-gray-600 dark:text-gray-300">
                                        Joined
                                    </th>

                                    <th class="px-4 py-3 text-sm font-semibold text-gray-600 dark:text-gray-300">
                                        Actions
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($users as $user)

                                    <tr class="border-b border-gray-100 dark:border-gray-700">

                                        <td class="px-4 py-4 text-gray-800 dark:text-gray-200">
                                            {{ $user->id }}
                                        </td>

                                        <td class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                            {{ $user->name }}
                                        </td>

                                        <td class="px-4 py-4 text-gray-600 dark:text-gray-300">
                                            {{ $user->email }}
                                        </td>

                                        <td class="px-4 py-4">

                                            @if($user->role === 'admin')

                                                <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                                    Admin
                                                </span>

                                            @elseif($user->role === 'faculty')

                                                <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                                                    Faculty
                                                </span>

                                            @elseif($user->role === 'supervisor')

                                                <span class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-700">
                                                    Supervisor
                                                </span>

                                            @else

                                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                                    Student
                                                </span>

                                            @endif

                                        </td>

                                        <td class="px-4 py-4 text-gray-600 dark:text-gray-300">
                                            {{ $user->created_at?->format('Y-m-d') }}
                                        </td>

                                        <td class="px-4 py-4">

                                            <div class="flex items-center gap-2">

                                                <a
                                                    href="{{ route('admin.users.edit', $user) }}"
                                                    class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600"
                                                >
                                                    Edit
                                                </a>

                                                @if($user->id !== auth()->id())

                                                    <form
                                                        method="POST"
                                                        action="{{ route('admin.users.destroy', $user) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete this user?');"
                                                    >

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                                                        >
                                                            Delete
                                                        </button>

                                                    </form>

                                                @endif

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="6"
                                            class="px-4 py-8 text-center text-gray-500"
                                        >
                                            No users found.
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>