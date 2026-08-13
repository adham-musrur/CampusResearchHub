<x-app-layout>

    <div class="max-w-5xl mx-auto mt-8 bg-white shadow rounded p-6">

        <h1 class="text-3xl font-bold mb-6">
            Edit Research Project
        </h1>

        <form method="POST" action="{{ route('projects.update', $project) }}">

            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label class="block font-medium mb-1">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $project->title) }}"
                    class="w-full border-gray-300 rounded"
                    required
                >
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block font-medium mb-1">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full border-gray-300 rounded"
                    required
                >{{ old('description', $project->description) }}</textarea>
            </div>

            <!-- Department -->
            <div class="mb-4">
                <label class="block font-medium mb-1">
                    Department
                </label>

                <input
                    type="text"
                    name="department"
                    value="{{ old('department', $project->department) }}"
                    class="w-full border-gray-300 rounded"
                    required
                >
            </div>

            <!-- Research Area -->
            <div class="mb-4">
                <label class="block font-medium mb-1">
                    Research Area
                </label>

                <input
                    type="text"
                    name="research_area"
                    value="{{ old('research_area', $project->research_area) }}"
                    class="w-full border-gray-300 rounded"
                    required
                >
            </div>

            <!-- Deadline -->
            <div class="mb-4">
                <label class="block font-medium mb-1">
                    Deadline
                </label>

                <input
                    type="date"
                    name="deadline"
                    value="{{ old('deadline', $project->deadline) }}"
                    class="w-full border-gray-300 rounded"
                    required
                >
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label class="block font-medium mb-1">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border-gray-300 rounded"
                    required
                >
                    <option value="pending"
                        {{ old('status', $project->status) == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="approved"
                        {{ old('status', $project->status) == 'approved' ? 'selected' : '' }}>
                        Approved
                    </option>

                    <option value="completed"
                        {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded"
                >
                    Update Project
                </button>

                <a
                    href="{{ route('projects.show', $project) }}"
                    class="bg-gray-600 text-white px-4 py-2 rounded"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</x-app-layout>