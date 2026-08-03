{{-- ==========================================================
PAGE: VIEW PROJECT

File:
resources/views/admin/projects/show.blade.php

Purpose:
Displays the complete details of a single portfolio
project inside the KaroDev Admin Dashboard.

Responsibilities:
• Display project image
• Display project information
• Display project links
• Display project descriptions
• Display featured status
• Display timestamps
• Provide administrator actions

========================================================== --}}

<x-app-layout>

    {{-- ======================================================
    DASHBOARD HEADER
    ======================================================= --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            View Project

        </h2>

    </x-slot>



    {{-- ======================================================
    MAIN PAGE
    ======================================================= --}}

    <div class="py-12">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- ==================================================
            ADMIN CARD
            =================================================== --}}

            <x-admin.card>

                {{-- ==================================================
                PAGE HEADER
                =================================================== --}}

                <div class="border-b p-6">

                    <h1 class="text-3xl font-bold text-slate-800">

                        {{ $project->title }}

                    </h1>

                    <p class="mt-2 text-slate-600">

                        Complete project information.

                    </p>

                </div>



                {{-- ==================================================
                PAGE CONTENT
                =================================================== --}}

                <div class="p-8 space-y-10">



                    {{-- ==================================================
                    PROJECT IMAGE

                    Displays the project's uploaded image.
                    =================================================== --}}

                    @if ($project->image)

                        <div>

                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="w-full max-w-3xl rounded-xl border shadow">

                        </div>

                    @endif



                    {{-- ==================================================
                    PROJECT INFORMATION
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- ==========================================
                        TECHNOLOGY
                        =========================================== --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Technology

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $project->technology }}

                            </p>

                        </div>



                        {{-- ==========================================
                        CATEGORY
                        =========================================== --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Category

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $project->category }}

                            </p>

                        </div>

                    </div>


                                        {{-- ==================================================
                    PROJECT LINKS

                    Purpose:
                    Displays external links associated with this
                    project.

                    Displays:
                    • GitHub Repository
                    • Live Demo
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- ==========================================
                        GITHUB REPOSITORY
                        =========================================== --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                GitHub Repository

                            </h3>

                            @if ($project->github_url)

                                <a
                                    href="{{ $project->github_url }}"
                                    target="_blank"
                                    class="mt-2 inline-block text-blue-600 hover:underline break-all">

                                    {{ $project->github_url }}

                                </a>

                            @else

                                <p class="mt-2 text-slate-400">

                                    No GitHub repository available.

                                </p>

                            @endif

                        </div>



                        {{-- ==========================================
                        LIVE DEMO
                        =========================================== --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Live Demo

                            </h3>

                            @if ($project->live_demo_url)

                                <a
                                    href="{{ $project->live_demo_url }}"
                                    target="_blank"
                                    class="mt-2 inline-block text-blue-600 hover:underline break-all">

                                    {{ $project->live_demo_url }}

                                </a>

                            @else

                                <p class="mt-2 text-slate-400">

                                    No live demo available.

                                </p>

                            @endif

                        </div>

                    </div>



                    {{-- ==================================================
                    PROJECT DESCRIPTION

                    Purpose:
                    Displays both the short summary and the
                    detailed description of the project.
                    =================================================== --}}

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                        {{-- ==========================================
                        SHORT DESCRIPTION
                        =========================================== --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800 mb-4">

                                Short Description

                            </h3>

                            <p class="text-slate-700 leading-relaxed">

                                {{ $project->short_description }}

                            </p>

                        </div>



                        {{-- ==========================================
                        FULL DESCRIPTION
                        =========================================== --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800 mb-4">

                                Full Description

                            </h3>

                            <div class="prose max-w-none text-slate-700">

                                {{ $project->description }}

                            </div>

                        </div>

                    </div>



                    {{-- ==================================================
                    PROJECT STATUS

                    Purpose:
                    Indicates whether this project is marked
                    as a Featured Project.
                    =================================================== --}}

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800 mb-4">

                            Featured Status

                        </h3>

                        @if ($project->featured)

                            <span
                                class="inline-flex px-4 py-2 rounded-full bg-green-100 text-green-700 font-medium">

                                ★ Featured Project

                            </span>

                        @else

                            <span
                                class="inline-flex px-4 py-2 rounded-full bg-gray-100 text-gray-700 font-medium">

                                Normal Project

                            </span>

                        @endif

                    </div>



                    {{-- ==================================================
                    PROJECT TIMESTAMPS

                    Purpose:
                    Displays when the project was created and
                    when it was last updated.
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Created

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $project->created_at->format('F d, Y \a\t h:i A') }}

                            </p>

                        </div>



                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Last Updated

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $project->updated_at->format('F d, Y \a\t h:i A') }}

                            </p>

                        </div>

                    </div>


                                        {{-- ==========================================================
                    PAGE ACTIONS

                    Purpose:
                    Provides quick actions for administrators.

                    Available Actions:
                    • Return to the Projects page
                    • Edit the current project

                    Future Improvements:
                    • Duplicate Project
                    • Archive Project
                    • Delete Project
                    • Preview Public Portfolio Page
                    ========================================================== --}}

                    <div class="flex items-center justify-between border-t pt-8">

                        {{-- ======================================================
                        BACK TO PROJECTS
                        ======================================================= --}}

                        <a
                            href="{{ route('projects.index') }}"
                            class="inline-flex items-center px-5 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">

                            ← Back to Projects

                        </a>



                        {{-- ======================================================
                        EDIT PROJECT
                        ======================================================= --}}

                        <a
                            href="{{ route('projects.edit', $project) }}"
                            class="inline-flex items-center px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">

                            Edit Project

                        </a>

                    </div>

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>