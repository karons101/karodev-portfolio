{{-- ==========================================================
PAGE: CREATE PROJECT

File:
resources/views/admin/projects/create.blade.php

Purpose:
Displays the form used to create a new portfolio
project inside the KaroDev Admin CMS.

Responsibilities:
• Collect project information
• Upload project image
• Mark project as featured
• Submit project for saving

Future Improvements:
• Validation Errors
• Image Preview
• Auto Slug Generator
• Rich Text Editor
• Multiple Image Upload
========================================================== --}}

<x-app-layout>

    {{-- =========================================================
    PAGE HEADER
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Add New Project

        </h2>

    </x-slot>



    {{-- =========================================================
    MAIN PAGE CONTENT
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- ==========================================================
            COMPONENT: ADMIN CARD
            ========================================================== --}}

            <x-admin.card>

                {{-- =====================================================
                PAGE TITLE
                ====================================================== --}}

                <div class="border-b p-6">

                    <h1 class="text-3xl font-bold text-slate-800">

                        Create Project

                    </h1>

                    <p class="mt-2 text-slate-600">

                        Add a new portfolio project.

                    </p>

                </div>



                {{-- =====================================================
                PROJECT FORM
                ====================================================== --}}

                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-8 space-y-10">

                    @csrf



                    {{-- =================================================
                    SECTION 1
                    PROJECT INFORMATION
                    ================================================== --}}

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

                                <input type="text" name="title" value="{{ old('title') }}"
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

                                <input type="text" name="slug" value="{{ old('slug') }}"
                                    class="w-full border rounded-lg p-3">

                                {{-- Validation Error --}}
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

                                <input type="text" name="technology" value="{{ old('technology') }}"
                                    class="w-full border rounded-lg p-3">

                                {{-- Validation Error --}}
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

                                <input type="text" name="category" value="{{ old('category') }}"
                                    class="w-full border rounded-lg p-3">

                                {{-- Validation Error --}}
                                @error('category')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>



                    {{-- =================================================
                    SECTION 2
                    PROJECT LINKS
                    ================================================== --}}

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

                                <input type="url" name="github_url" value="{{ old('github_url') }}"
                                    class="w-full border rounded-lg p-3">

                                {{-- Validation Error --}}
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

                                <input type="url" name="live_demo_url" value="{{ old('live_demo_url') }}"
                                    class="w-full border rounded-lg p-3">

                                {{-- Validation Error --}}
                                @error('live_demo_url')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>



                    {{-- =================================================
                    SECTION 3
                    PROJECT DESCRIPTION
                    ================================================== --}}

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
                                    class="w-full border rounded-lg p-3">{{ old('short_description') }}</textarea>

                                {{-- Validation Error --}}
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
                                    class="w-full border rounded-lg p-3">{{ old('description') }}</textarea>

                                {{-- Validation Error --}}
                                @error('description')

                                    <p class="mt-2 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>



                    {{-- =================================================
                    SECTION 4
                    MEDIA
                    ================================================== --}}

                    <div>

                        <h2 class="text-xl font-semibold text-slate-800 mb-6">

                            Media

                        </h2>

                        <div>

                            <label class="block mb-2 font-semibold">

                                Project Image

                            </label>

                            <input type="file" name="image" class="w-full">

                            {{-- Validation Error --}}
                            @error('image')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>



                    {{-- =================================================
                    SECTION 5
                    PORTFOLIO DISPLAY SETTINGS

                    ================================================== --

                    
                    Purpose:
                    Controls how this project behaves inside
                    the public KaroDev portfolio.

                    Settings:
                    • Featured
                    • Published
                    • Display Order

                    Featured:
                    Determines whether this project receives
                    special visual emphasis on the portfolio.

                    Published:
                    Determines whether this project is allowed
                    to appear publicly.

                    Display Order:
                    Determines the position of the project when
                    projects are ordered by the CMS.

                    Example:

                    CourierXpress → Order 1
                    Yellow Sail → Order 2
                    NovaCare → Order 3
                    

                    ================================================== --}}

                    <div>

                        
                        <div class="mb-6">

                            <h2 class="text-xl font-semibold text-slate-800">

                                Portfolio Display Settings

                            </h2>

                            <p class="mt-1 text-sm text-slate-500">

                                Control whether this project is published,
                                featured, and where it appears in the
                                KaroDev portfolio.

                            </p>

                        </div>


                        {{-- =================================================
                        FEATURED PROJECT
                        ================================================== --}}

                        <div class="rounded-xl
            border
            border-slate-200
            bg-slate-50
            p-5
            mb-6">

                            <div class="flex items-start gap-4">

                                <input id="featured" type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="mt-1
                   rounded
                   border-gray-300
                   text-blue-600
                   shadow-sm
                   focus:ring-blue-500">

                                <div>

                                    <label for="featured" class="font-semibold text-slate-800">

                                        Feature this project

                                    </label>

                                    <p class="mt-1 text-sm leading-6 text-slate-500">

                                        Highlight this project in prominent
                                        areas of the public KaroDev portfolio.

                                    </p>

                                </div>

                            </div>

                            @error('featured')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>


                        {{-- =================================================
                        PUBLISHED PROJECT
                        ================================================== --}}

                        <div class="rounded-xl
            border
            border-slate-200
            bg-slate-50
            p-5
            mb-6">

                            <div class="flex items-start gap-4">

                                <input id="published" type="checkbox" name="published" value="1" {{ old('published') ? 'checked' : '' }} class="mt-1
                   rounded
                   border-gray-300
                   text-blue-600
                   shadow-sm
                   focus:ring-blue-500">

                                <div>

                                    <label for="published" class="font-semibold text-slate-800">

                                        Publish this project

                                    </label>

                                    <p class="mt-1 text-sm leading-6 text-slate-500">

                                        Published projects can appear on the
                                        public KaroDev portfolio. Unpublished
                                        projects remain available in the admin
                                        dashboard without being publicly displayed.

                                    </p>

                                </div>

                            </div>

                            @error('published')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>


                        {{-- =================================================
                        DISPLAY ORDER
                        ================================================== --}}

                        <div>

                            <label for="sort_order" class="block mb-2 font-semibold text-slate-700">

                                Display Order

                            </label>

                            <input id="sort_order" type="number" name="sort_order" min="0"
                                value="{{ old('sort_order', 0) }}" class="w-full
               rounded-lg
               border-gray-300
               shadow-sm
               focus:border-blue-500
               focus:ring-blue-500">

                            <p class="mt-2 text-xs text-slate-500">

                                Lower numbers appear first.
                                For example, entering 1 places this
                                project before a project ordered at 2.

                            </p>

                            @error('sort_order')

                                <p class="mt-1 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>
                        ```

                    </div>



                    {{-- =================================================
                    SECTION 6
                    ACTION BUTTONS
                    ================================================== --}}

                    <div class="flex items-center gap-4 pt-4">

                        <button type="submit"
                            class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">

                            Save Project

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