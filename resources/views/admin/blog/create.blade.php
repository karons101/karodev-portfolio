{{-- ==========================================================
PAGE: CREATE BLOG POST

File:
resources/views/admin/blog/create.blade.php

Purpose:
Provides the administrator with a professional
form for creating new blog posts.

Responsibilities:
• Capture blog information
• Upload featured image
• Enter article content
• Configure SEO
• Configure publication settings

========================================================== --}}

<x-app-layout>

    {{-- =========================================================
    DASHBOARD PAGE HEADER
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Create Blog Post

        </h2>

    </x-slot>



    {{-- =========================================================
    MAIN PAGE
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <x-admin.card>

                {{-- =====================================================
                PAGE HEADER
                ====================================================== --}}

                <div class="border-b p-6">

                    <h1 class="text-3xl font-bold text-slate-800">

                        New Blog Post

                    </h1>

                    <p class="mt-2 text-slate-600">

                        Create a new article for your portfolio blog.

                    </p>

                </div>



                {{-- =====================================================
                BLOG FORM
                ====================================================== --}}

                <form
                    action="{{ route('blog-posts.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="p-8 space-y-8">

                    @csrf



                    {{-- ==================================================
                    BASIC INFORMATION
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- ==========================================
                        BLOG TITLE
                        =========================================== --}}

                        <div>

                            <label
                                for="title"
                                class="block text-sm font-semibold text-slate-700">

                                Blog Title

                            </label>

                            <input

                                type="text"

                                id="title"

                                name="title"

                                value="{{ old('title') }}"

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('title')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>



                        {{-- ==========================================
                        BLOG SLUG
                        =========================================== --}}

                        <div>

                            <label
                                for="slug"
                                class="block text-sm font-semibold text-slate-700">

                                Slug

                            </label>

                            <input

                                type="text"

                                id="slug"

                                name="slug"

                                value="{{ old('slug') }}"

                                placeholder="my-awesome-blog-post"

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('slug')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>



                        {{-- ==========================================
                        CATEGORY
                        =========================================== --}}

                        <div>

                            <label
                                for="category"
                                class="block text-sm font-semibold text-slate-700">

                                Category

                            </label>

                            <input

                                type="text"

                                id="category"

                                name="category"

                                value="{{ old('category') }}"

                                placeholder="Laravel"

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('category')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                                        {{-- ==================================================
                    FEATURED IMAGE
                    =================================================== --}}

                    <div>

                        <label
                            for="featured_image"
                            class="block text-sm font-semibold text-slate-700">

                            Featured Image

                        </label>

                        <input

                            type="file"

                            id="featured_image"

                            name="featured_image"

                            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm">

                        @error('featured_image')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- ==================================================
                    SHORT EXCERPT
                    =================================================== --}}

                    <div>

                        <label
                            for="excerpt"
                            class="block text-sm font-semibold text-slate-700">

                            Short Excerpt

                        </label>

                        <textarea

                            id="excerpt"

                            name="excerpt"

                            rows="4"

                            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('excerpt') }}</textarea>

                        @error('excerpt')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- ==================================================
                    FULL ARTICLE CONTENT
                    =================================================== --}}

                    <div>

                        <label
                            for="content"
                            class="block text-sm font-semibold text-slate-700">

                            Blog Content

                        </label>

                        <textarea

                            id="content"

                            name="content"

                            rows="15"

                            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('content') }}</textarea>

                        @error('content')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- ==================================================
                    SEO INFORMATION
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- ==========================================
                        META TITLE
                        =========================================== --}}

                        <div>

                            <label
                                for="meta_title"
                                class="block text-sm font-semibold text-slate-700">

                                Meta Title

                            </label>

                            <input

                                type="text"

                                id="meta_title"

                                name="meta_title"

                                value="{{ old('meta_title') }}"

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('meta_title')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>



                        {{-- ==========================================
                        META DESCRIPTION
                        =========================================== --}}

                        <div>

                            <label
                                for="meta_description"
                                class="block text-sm font-semibold text-slate-700">

                                Meta Description

                            </label>

                            <textarea

                                id="meta_description"

                                name="meta_description"

                                rows="4"

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('meta_description') }}</textarea>

                            @error('meta_description')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                                        {{-- ==================================================
                    TAGS
                    =================================================== --}}

                    <div>

                        <label
                            for="tags"
                            class="block text-sm font-semibold text-slate-700">

                            Tags

                        </label>

                        <input

                            type="text"

                            id="tags"

                            name="tags"

                            value="{{ old('tags') }}"

                            placeholder="Laravel, PHP, Web Development"

                            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                        @error('tags')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- ==================================================
                    PUBLICATION SETTINGS
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- ==========================================
                        FEATURED
                        =========================================== --}}

                        <div>

                            <label class="flex items-center gap-3">

                                <input

                                    type="checkbox"

                                    name="featured"

                                    value="1"

                                    {{ old('featured') ? 'checked' : '' }}

                                    class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500">

                                <span class="text-slate-700">

                                    Featured Blog Post

                                </span>

                            </label>

                        </div>



                        {{-- ==========================================
                        PUBLISHED
                        =========================================== --}}

                        <div>

                            <label class="flex items-center gap-3">

                                <input

                                    type="checkbox"

                                    name="published"

                                    value="1"

                                    {{ old('published', true) ? 'checked' : '' }}

                                    class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500">

                                <span class="text-slate-700">

                                    Publish Immediately

                                </span>

                            </label>

                        </div>

                    </div>



                    {{-- ==================================================
                    PUBLICATION DATE
                    =================================================== --}}

                    <div>

                        <label
                            for="published_at"
                            class="block text-sm font-semibold text-slate-700">

                            Publish Date

                        </label>

                        <input

                            type="datetime-local"

                            id="published_at"

                            name="published_at"

                            value="{{ old('published_at') }}"

                            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                        @error('published_at')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- ==================================================
                    FORM ACTIONS
                    =================================================== --}}

                    <div class="flex items-center gap-4 pt-8 border-t">

                        <button

                            type="submit"

                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">

                            Save Blog Post

                        </button>

                        <a

                            href="{{ route('blog-posts.index') }}"

                            class="px-6 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg transition">

                            Cancel

                        </a>

                    </div>

                </form>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>
