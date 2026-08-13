<x-app-layout>

    <div class="max-w-4xl mx-auto mt-8 bg-white shadow rounded p-6">

        <h2 class="text-2xl font-bold mb-6">
            Create Research Project
        </h2>

        <form action="{{ route('projects.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Project Title</label>

                <input
                    type="text"
                    name="title"
                    class="w-full border rounded p-2"
                    required>
            </div>


            <div class="mb-4">
                <label class="block font-semibold">Description</label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full border rounded p-2"
                    required></textarea>
            </div>


            <div class="mb-4">
                <label class="block font-semibold">Department</label>

                <input
                    type="text"
                    name="department"
                    class="w-full border rounded p-2"
                    required>
            </div>


            <div class="mb-4">
                <label class="block font-semibold">Research Area</label>

                <input
                    type="text"
                    name="research_area"
                    class="w-full border rounded p-2"
                    required>
            </div>


            <div class="mb-4">
                <label class="block font-semibold">Deadline</label>

                <input
                    type="date"
                    name="deadline"
                    class="w-full border rounded p-2"
                    required>
            </div>


            <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded">

                Create Project

            </button>

        </form>

    </div>

</x-app-layout>