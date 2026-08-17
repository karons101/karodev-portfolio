{{-- ==========================================================
PAGE: PROJECT MANAGEMENT


File:
resources/views/admin/projects/index.blade.php


Purpose:
Displays every portfolio project stored in the
database and provides the main Project CMS interface.


Responsibilities:
• List all projects
• Search projects
• Display project images
• Display project information
• Display Featured status
• Display Published / Draft status
• Navigate to Create Project page
• Provide View / Edit / Delete actions


CRUD Progress:
✓ Create
✓ Read
✓ Update
✓ Delete


========================================================== --}}


<x-app-layout>


    {{-- =========================================================
    DASHBOARD PAGE HEADER
    ========================================================== --}}


    <x-slot name="header">


        <div class="flex items-center justify-between gap-4">


            <div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Project Management
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Manage the projects displayed throughout your KaroDev portfolio.
                </p>

            </div>


            <a href="{{ route('projects.create') }}" class="inline-flex
                       items-center
                       rounded-lg
                       bg-blue-600
                       px-5
                       py-2.5
                       text-sm
                       font-semibold
                       text-white
                       shadow-sm
                       hover:bg-blue-700
                       hover:-translate-y-0.5
                       transition
                       duration-200">

                + Add New Project

            </a>


        </div>


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
                            Create, edit, publish, feature, and manage
                            your KaroDev portfolio projects.
                        </p>

                    </div>


                    <a href="{{ route('projects.create') }}" class="px-5
                               py-3
                               bg-blue-600
                               text-white
                               rounded-lg
                               shadow
                               hover:bg-blue-700
                               transition">

                        + Add New Project

                    </a>


                </div>


                {{-- ==========================================================
                SEARCH PROJECTS

                Purpose:
                Allows administrators to quickly search projects.

                Search Fields:
                • Project Title
                • Technology
                • Category

                The search keyword is preserved while navigating
                through paginated pages.
                ========================================================== --}}


                <div class="p-6 border-b bg-white">


                    <form action="{{ route('projects.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">


                        {{-- =====================================================
                        SEARCH INPUT
                        ====================================================== --}}


                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by title, technology or category..." class="w-full
                                   md:flex-1
                                   rounded-lg
                                   border-gray-300
                                   shadow-sm
                                   focus:border-blue-500
                                   focus:ring-blue-500">


                        {{-- =====================================================
                        SEARCH BUTTON
                        ====================================================== --}}


                        <button type="submit" class="px-6
                                   py-3
                                   bg-blue-600
                                   text-white
                                   rounded-lg
                                   hover:bg-blue-700
                                   transition">

                            Search

                        </button>


                        {{-- =====================================================
                        CLEAR SEARCH BUTTON
                        ====================================================== --}}


                        @if (request('search'))

                            <a href="{{ route('projects.index') }}" class="px-6
                                           py-3
                                           bg-gray-200
                                           text-gray-700
                                           rounded-lg
                                           hover:bg-gray-300
                                           transition
                                           text-center">

                                Clear

                            </a>

                        @endif


                    </form>


                </div>


                {{-- =====================================================
                PROJECT TABLE
                ====================================================== --}}


                <div class="overflow-x-auto">


                    <table class="min-w-full">


                        <thead class="bg-slate-100">


                            <tr>


                                {{-- =================================================
                                IMAGE COLUMN
                                ================================================== --}}


                                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-700">

                                    Image

                                </th>


                                {{-- =================================================
                                TITLE COLUMN
                                ================================================== --}}


                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">

                                    Title

                                </th>


                                {{-- =================================================
                                TECHNOLOGY COLUMN
                                ================================================== --}}


                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">

                                    Technology

                                </th>


                                {{-- =================================================
                                FEATURED COLUMN
                                ================================================== --}}


                                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-700">

                                    Featured

                                </th>


                                {{-- =================================================
                                PUBLISHED COLUMN
                                ================================================== --}}


                                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-700">

                                    Published

                                </th>


                                {{-- =================================================
                                ACTIONS COLUMN
                                ================================================== --}}


                                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-700">

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
                                                class="w-16
                                                               h-16
                                                               object-cover
                                                               rounded-lg
                                                               border
                                                               mx-auto
                                                               shadow-sm">


                                        @else


                                            <span class="text-slate-400 text-sm">

                                                No Image

                                            </span>


                                        @endif


                                    </td>


                                    {{-- ==========================================================
                                    PROJECT TITLE
                                    ========================================================== --}}


                                    <td class="px-6 py-4">


                                        <div>

                                            <p class="font-semibold text-slate-800">

                                                {{ $project->title }}

                                            </p>

                                            <p class="mt-1 text-sm text-slate-500">

                                                {{ $project->category }}

                                            </p>

                                        </div>


                                    </td>


                                    {{-- ==========================================================
                                    TECHNOLOGY STACK
                                    ========================================================== --}}


                                    <td class="px-6 py-4">

                                        <span class="text-sm text-slate-700">

                                            {{ $project->technology }}

                                        </span>

                                    </td>

                                    {{-- ==========================================================
                                    FEATURED STATUS

                                    Purpose:
                                    Indicates whether this project has been selected
                                    as a featured KaroDev portfolio project.

                                    Logic:
                                    • Featured = ★ Featured
                                    • Not Featured = Normal
                                    ========================================================== --}}


                                    <td class="px-6 py-4 text-center">


                                        @if ($project->featured)


                                            <span class="inline-flex
                                                                 items-center
                                                                 rounded-full
                                                                 bg-amber-100
                                                                 px-3
                                                                 py-1
                                                                 text-xs
                                                                 font-semibold
                                                                 text-amber-700">

                                                ★ Featured

                                            </span>


                                        @else


                                            <span class="inline-flex
                                                                 items-center
                                                                 rounded-full
                                                                 bg-slate-100
                                                                 px-3
                                                                 py-1
                                                                 text-xs
                                                                 font-semibold
                                                                 text-slate-500">

                                                Normal

                                            </span>


                                        @endif


                                    </td>


                                    {{-- ==========================================================
                                    PUBLISHED STATUS

                                    Purpose:
                                    Indicates whether this project is currently
                                    published on the public KaroDev portfolio.

                                    Logic:
                                    • Published = ● Published
                                    • Not Published = Draft

                                    IMPORTANT:
                                    This reads the "published" field from the
                                    projects database table.
                                    ========================================================== --}}


                                    <td class="px-6 py-4 text-center">


                                        @if ($project->published)


                                            <span class="inline-flex
                                                                 items-center
                                                                 rounded-full
                                                                 bg-emerald-100
                                                                 px-3
                                                                 py-1
                                                                 text-xs
                                                                 font-semibold
                                                                 text-emerald-700">

                                                ● Published

                                            </span>


                                        @else


                                            <span class="inline-flex
                                                                 items-center
                                                                 rounded-full
                                                                 bg-slate-100
                                                                 px-3
                                                                 py-1
                                                                 text-xs
                                                                 font-semibold
                                                                 text-slate-500">

                                                Draft

                                            </span>


                                        @endif


                                    </td>


                                    {{-- ==========================================================
                                    ACTION BUTTONS

                                    Responsibilities:
                                    • View project
                                    • Edit project
                                    • Delete project
                                    ========================================================== --}}


                                    <td class="px-6 py-4">


                                        <div class="flex items-center justify-center gap-4">


                                            {{-- ==================================================
                                            VIEW PROJECT
                                            ================================================== --}}


                                            <a href="{{ route('projects.show', $project) }}" class="text-emerald-600
                                                           hover:text-emerald-800
                                                           font-semibold
                                                           transition">

                                                View

                                            </a>


                                            {{-- ==================================================
                                            EDIT PROJECT
                                            ================================================== --}}


                                            <a href="{{ route('projects.edit', $project) }}" class="text-blue-600
                                                           hover:text-blue-800
                                                           font-semibold
                                                           transition">

                                                Edit

                                            </a>


                                            {{-- ==================================================
                                            DELETE PROJECT
                                            ================================================== --}}


                                            <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Delete this project permanently?')">


                                                @csrf

                                                @method('DELETE')


                                                <button type="submit" class="font-semibold
                                                               text-red-600
                                                               hover:text-red-800
                                                               transition">

                                                    Delete

                                                </button>


                                            </form>


                                        </div>


                                    </td>


                                </tr>


                            @empty


                                {{-- ==========================================================
                                EMPTY PROJECT STATE

                                Displays when no projects exist or when
                                the current search returns no results.
                                ========================================================== --}}


                                <tr>


                                    <td colspan="6" class="px-6
                                                   py-16
                                                   text-center
                                                   text-slate-500">


                                        <div>


                                            <p class="text-lg font-semibold text-slate-700">

                                                No projects found.

                                            </p>


                                            <p class="mt-1 text-sm">

                                                Create your first KaroDev project to get started.

                                            </p>


                                            @if (request('search'))


                                                <a href="{{ route('projects.index') }}" class="inline-flex
                                                                   mt-5
                                                                   items-center
                                                                   rounded-lg
                                                                   bg-slate-800
                                                                   px-5
                                                                   py-2.5
                                                                   text-sm
                                                                   font-semibold
                                                                   text-white
                                                                   hover:bg-slate-900
                                                                   transition">

                                                    Clear Search

                                                </a>


                                            @endif


                                        </div>


                                    </td>


                                </tr>


                            @endforelse


                        </tbody>


                    </table>


                </div>

                {{-- ==========================================================
                PROJECT PAGINATION

                Purpose:
                Displays professional Laravel pagination links.

                Features:
                • Previous / Next navigation
                • Page numbers
                • Preserves search results
                • Responsive layout

                ========================================================== --}}


                @if ($projects->hasPages())


                    <div class="px-6 py-6 border-t bg-white">


                        {{ $projects->links() }}


                    </div>


                @endif


            </x-admin.card>


        </div>


    </div>


</x-app-layout>