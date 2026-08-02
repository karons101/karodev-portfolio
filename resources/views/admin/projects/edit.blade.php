{{-- ==========================================================
PAGE: EDIT PROJECT

File:
resources/views/admin/projects/edit.blade.php

Purpose:
Displays the form used to edit an existing portfolio
project inside the KaroDev Admin CMS.

Responsibilities:
• Edit project information
• Update project links
• Replace project image
• Update descriptions
• Toggle Featured status
• Save changes

Future Improvements:
• Image Preview
• Auto Slug Generator
• Rich Text Editor
• Multiple Image Upload
========================================================== --}}

<x-app-layout>

    {{-- ==========================================================
    PAGE HEADER
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Edit Project

        </h2>

    </x-slot>



    {{-- ==========================================================
    MAIN PAGE CONTENT
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- ======================================================
            ADMIN CARD COMPONENT
            ======================================================= --}}

            <x-admin.card>

                {{-- ==================================================
                PAGE TITLE
                =================================================== --}}

                <div class="border-b p-6">

                    <h1 class="text-3xl font-bold text-slate-800">

                        Edit Project

                    </h1>

                    <p class="mt-2 text-slate-600">

                        Update an existing portfolio project.

                    </p>

                </div>



                {{-- ==================================================
                EDIT PROJECT FORM

                Route:
                projects.update

                HTTP Method:
                PUT
                =================================================== --}}

                <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data"
                    class="p-8 space-y-10">

                    @csrf
                    @method('PUT')



                    {{-- ==================================================
                    SECTION 1
                    PROJECT INFORMATION
                    =================================================== --}}

                    <div>

                        <h2 class="text-xl font-semibold text-slate-800 mb-6">

                            Project Information

                        </h2>

                        <div class="space-y-6">

                            {{-- Project Title --}}

                            <div>

                                <label class="block mb-2 font-semibold">

                                    Project Title

                                </label>

                                <input type="text" name="title" value="{{ old('title', $project->title) }}"
                                    class="w-full border rounded-lg p-3">

                                @error('title')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>



                            {{-- Slug --}}

                            <div>

                                <label class="block mb-2 font-semibold">

                                    Slug

                                </label>

                                <input type="text" name="slug" value="{{ old('slug', $project->slug) }}"
                                    class="w-full border rounded-lg p-3">

                                @error('slug')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>



                            {{-- Technology Stack --}}

                            <div>

                                <label class="block mb-2 font-semibold">

                                    Technology Stack

                                </label>

                                <input type="text" name="technology"
                                    value="{{ old('technology', $project->technology) }}"
                                    class="w-full border rounded-lg p-3">

                                @error('technology')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>



                            {{-- Category --}}

                            <div>

                                <label class="block mb-2 font-semibold">

                                    Category

                                </label>

                                <input type="text" name="category" value="{{ old('category', $project->category) }}"
                                    class="w-full border rounded-lg p-3">

                                @error('category')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>



                    {{-- ==================================================
                    SECTION 2
                    PROJECT LINKS
                    =================================================== --}}

                    <div>

                        <h2 class="text-xl font-semibold text-slate-800 mb-6">

                            Project Links

                        </h2>

                        <div class="space-y-6">

                            {{-- GitHub URL --}}

                            <div>

                                <label class="block mb-2 font-semibold">

                                    GitHub URL

                                </label>

                                <input type="url" name="github_url"
                                    value="{{ old('github_url', $project->github_url) }}"
                                    class="w-full border rounded-lg p-3">

                                @error('github_url')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>



                            {{-- Live Demo URL --}}

                            <div>

                                <label class="block mb-2 font-semibold">

                                    Live Demo URL

                                </label>

                                <input type="url" name="live_demo_url"
                                    value="{{ old('live_demo_url', $project->live_demo_url) }}"
                                    class="w-full border rounded-lg p-3">

                                @error('live_demo_url')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>

                    {{-- ==================================================
                    SECTION 3
                    PROJECT DESCRIPTION
                    =================================================== --}}

                    <div>

                        <h2 class="text-xl font-semibold text-slate-800 mb-6">

                            Project Description

                        </h2>

                        <div class="space-y-6">

                            {{-- Short Description --}}

                            <div>

                                <label class="block mb-2 font-semibold">

                                    Short Description

                                </label>

                                <textarea name="short_description" rows="3"
                                    class="w-full border rounded-lg p-3">{{ old('short_description', $project->short_description) }}</textarea>

                                @error('short_description')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>



                            {{-- Full Description --}}

                            <div>

                                <label class="block mb-2 font-semibold">

                                    Full Description

                                </label>

                                <textarea name="description" rows="8"
                                    class="w-full border rounded-lg p-3">{{ old('description', $project->description) }}</textarea>

                                @error('description')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>



                    {{-- ==================================================
                    SECTION 4
                    PROJECT IMAGE
                    =================================================== --}}

                    <div>

                        <h2 class="text-xl font-semibold text-slate-800 mb-6">

                            Project Image

                        </h2>

                        {{-- ==========================================================
                        CURRENT PROJECT IMAGE

                        Purpose:
                        Displays the image currently stored in the database.

                        NOTE:
                        HTML file inputs cannot display previously uploaded files,
                        so we show the current image separately.
                        ========================================================== --}}

                        @if ($project->image)

                            <div class="mb-6">

                                <p class="font-semibold mb-3">

                                    Current Image

                                </p>

                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                    class="w-64 rounded-lg border shadow rounded-lg">

                            </div>

                        @endif



                        {{-- ==========================================================
                        REPLACE IMAGE
                        ========================================================== --}}

                        <div>

                            <label class="block mb-2 font-semibold">

                                Replace Image

                            </label>

                            <input type="file" name="image" class="w-full">

                            @error('image')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>



                    {{-- ==================================================
                    SECTION 5
                    OPTIONS
                    =================================================== --}}

                    <div>

                        <h2 class="text-xl font-semibold text-slate-800 mb-6">

                            Options

                        </h2>

                        <label class="inline-flex items-center gap-3">

                            <input type="checkbox" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}>

                            <span>

                                Feature this project on the homepage

                            </span>

                        </label>

                    </div>



                    {{-- ==================================================
                    SECTION 6
                    ACTION BUTTONS
                    =================================================== --}}

                    <div class="flex items-center gap-4 pt-4">

                        <button type="submit"
                            class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">

                            Update Project

                        </button>

                        <a href="{{ route('projects.index') }}"
                            class="px-8 py-3 bg-slate-200 text-slate-800 rounded-lg hover:bg-slate-300 transition">

                            Cancel

                        </a>

                    </div>

                </form>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>