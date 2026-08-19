<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">

                <form
                    method="POST"
                    action="{{ route('admin.users.update', $user) }}"
                >

                    @csrf
                    @method('PUT')


                    {{-- Name --}}
                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            required
                            class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white"
                        >

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Email --}}
                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            required
                            class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white"
                        >

                        @error('email')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Role --}}
                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Role
                        </label>

                        <select
                            name="role"
                            required
                            class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white"
                        >

                            <option value="student" @selected(old('role', $user->role) === 'student')>
                                Student
                            </option>

                            <option value="faculty" @selected(old('role', $user->role) === 'faculty')>
                                Faculty
                            </option>

                            <option value="supervisor" @selected(old('role', $user->role) === 'supervisor')>
                                Supervisor
                            </option>

                            <option value="admin" @selected(old('role', $user->role) === 'admin')>
                                Admin
                            </option>

                        </select>

                        @error('role')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Password --}}
                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            New Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white"
                        >

                        <p class="mt-1 text-sm text-gray-500">
                            Leave blank if you don't want to change the password.
                        </p>

                        @error('password')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Confirm Password --}}
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Confirm New Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white"
                        >

                    </div>


                    {{-- Buttons --}}
                    <div class="flex items-center gap-3">

                        <button
                            type="submit"
                            class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                        >
                            Update User
                        </button>

                        <a
                            href="{{ route('admin.users.index') }}"
                            class="px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>