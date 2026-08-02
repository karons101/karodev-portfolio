{{-- ==========================================================
PAGE: PROJECT MANAGEMENT

File:
resources/views/admin/projects/index.blade.php

Purpose:
Displays every portfolio project stored in the
database.

Responsibilities:
• List all projects
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

    Appears inside the authenticated dashboard layout.
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Project Management

        </h2>

    </x-slot>



    {{-- =========================================================
    MAIN PAGE CONTAINER
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ==========================================================
            COMPONENT: ADMIN CARD

            File:
            resources/views/components/admin/card.blade.php

            Purpose:
            Reusable white container used across the
            Admin CMS.

            Benefits:
            • Consistent design
            • Less repeated HTML
            • Easier future maintenance
            ========================================================== --}}

            <x-admin.card>

                {{-- =====================================================
                PAGE TITLE + CREATE BUTTON
                ====================================================== --}}

                <div class="flex items-center justify-between p-6 border-b">

                    {{-- ===============================================
                    PAGE DESCRIPTION
                    ================================================ --}}

                    <div>

                        <h1 class="text-3xl font-bold text-slate-800">

                            Projects

                        </h1>

                        <p class="mt-2 text-slate-600">

                            Manage your portfolio projects.

                        </p>

                    </div>



                    {{-- ===============================================
                    ADD PROJECT BUTTON

                    Takes the administrator to the
                    Create Project page.
                    ================================================ --}}

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

                        {{-- =============================================
                        TABLE HEADINGS
                        ============================================== --}}

                        <thead class="bg-slate-100">

                            <tr>

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



                        {{-- =============================================
                        TABLE BODY

                        Displays all projects retrieved
                        from the ProjectController.
                        ============================================== --}}

                        <tbody>

                            {{-- ==========================================
                            LOOP THROUGH ALL PROJECTS

                            If projects exist:
                            Display each project.

                            Otherwise:
                            Display "No projects found."
                            =========================================== --}}

                            @forelse ($projects as $project)

                                <tr class="border-b hover:bg-slate-50 transition">

                                    {{-- ===============================
                                    PROJECT TITLE
                                    ================================ --}}

                                    <td class="px-6 py-4 font-semibold text-slate-800">

                                        {{ $project->title }}

                                    </td>



                                    {{-- ===============================
                                    TECHNOLOGY STACK
                                    ================================ --}}

                                    <td class="px-6 py-4">

                                        {{ $project->technology }}

                                    </td>



                                    {{-- ===============================
                                    PROJECT STATUS

                                    Featured Project?
                                    ================================ --}}

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

                                    Purpose:
                                    Provides quick access to edit or delete a project.

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

                                    <td colspan="4" class="px-6 py-12 text-center text-slate-500">

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