{{-- ==========================================================
PAGE: PROJECT MANAGEMENT

File:
resources/views/admin/projects/index.blade.php

Purpose:
Displays every portfolio project stored in the
database.

Responsibilities:
• List all projects
• Display project images
• Display project information
• Navigate to Create Project page
• Provide Edit/Delete actions

CRUD Progress:
✔ Create
✔ Read
✔ Update
✔ Delete

========================================================== --}}

<x-app-layout>

    {{-- =========================================================
    DASHBOARD PAGE HEADER
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Project Management

        </h2>

    </x-slot>

    {{-- =========================================================
    MAIN PAGE
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-admin.card>

                {{-- =====================================================
                PAGE TITLE
                ====================================================== --}}

                <div class="flex items-center justify-between p-6 border-b">

                    <div>

                        <h1 class="text-3xl font-bold text-slate-800">

                            Projects

                        </h1>

                        <p class="mt-2 text-slate-600">

                            Manage your portfolio projects.

                        </p>

                    </div>

                    <a href="{{ route('projects.create') }}"
                        class="px-5 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">

                        + Add New Project

                    </a>

                </div>

                {{-- =====================================================
                PROJECT TABLE
                ====================================================== --}}

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-slate-100">

                            <tr>

                                <th class="px-6 py-4 text-center">

                                    Image

                                </th>

                                <th class="px-6 py-4 text-left">

                                    Title

                                </th>

                                <th class="px-6 py-4 text-left">

                                    Technology

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Status

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Actions

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($projects as $project)

                                <tr class="border-b hover:bg-slate-50 transition">

                                    {{-- ==========================================================
                                    PROJECT IMAGE

                                    Purpose:
                                    Displays the project's thumbnail image.

                                    Logic:
                                    • If an image exists:
                                    Display the uploaded image.

                                    • Otherwise:
                                    Display "No Image".

                                    Images are loaded from Laravel's
                                    public storage directory.
                                    ========================================================== --}}

                                    <td class="px-6 py-4 text-center">

                                        @if ($project->image)

                                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                                class="w-16 h-16 object-cover rounded-lg border mx-auto">

                                        @else

                                            <span class="text-slate-400 text-sm">

                                                No Image

                                            </span>

                                        @endif

                                    </td>



                                    {{-- ==========================================================
                                    PROJECT TITLE
                                    ========================================================== --}}

                                    <td class="px-6 py-4 font-semibold text-slate-800">

                                        {{ $project->title }}

                                    </td>



                                    {{-- ==========================================================
                                    TECHNOLOGY STACK
                                    ========================================================== --}}

                                    <td class="px-6 py-4">

                                        {{ $project->technology }}

                                    </td>



                                    {{-- ==========================================================
                                    PROJECT STATUS

                                    Purpose:
                                    Indicates whether this project is featured.

                                    • Featured = Green badge
                                    • Normal = Gray badge

                                    Future:
                                    • Draft
                                    • Archived
                                    • Hidden
                                    • Completed
                                    • In Progress
                                    ========================================================== --}}

                                    <td class="px-6 py-4 text-center">

                                        @if ($project->featured)

                                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                                                Featured

                                            </span>

                                        @else

                                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm">

                                                Normal

                                            </span>

                                        @endif

                                    </td>



                                    {{-- ==========================================================
                                    ACTION BUTTONS
                                    ========================================================== --}}

                                    <td class="px-6 py-4">

                                        <div class="flex items-center justify-center gap-4">

                                            {{-- Edit Project --}}

                                            <a href="{{ route('projects.edit', $project) }}"
                                                class="text-blue-600 hover:text-blue-800 font-medium">

                                                Edit

                                            </a>



                                            {{-- Delete Project --}}

                                            <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                                class="inline">

                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="text-gray-400 cursor-not-allowed font-medium"
                                                    title="Delete feature coming soon">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="px-6 py-12 text-center text-slate-500">

                                        No projects found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>