{{-- ==========================================================
PAGE: EDIT BLOG POST

File:
resources/views/admin/blog/edit.blade.php

Purpose:
Allows the administrator to update an existing
blog post.

Responsibilities:
• Display current blog information
• Replace featured image
• Edit article content
• Update SEO
• Modify publication settings

========================================================== --}}

<x-app-layout>

    {{-- =========================================================
    DASHBOARD PAGE HEADER
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Edit Blog Post

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

                        Edit Blog Post

                    </h1>

                    <p class="mt-2 text-slate-600">

                        Update this blog article.

                    </p>

                </div>



                {{-- =====================================================
                EDIT FORM
                ====================================================== --}}

                <form
                    action="{{ route('blog-posts.update', $blogPost) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="p-8 space-y-8">

                    @csrf
                    @method('PUT')



                    {{-- ==================================================
                    CURRENT FEATURED IMAGE
                    =================================================== --}}

                    @if ($blogPost->featured_image)

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-3">

                                Current Featured Image

                            </label>

                            <img
                                src="{{ asset('storage/' . $blogPost->featured_image) }}"
                                alt="{{ $blogPost->title }}"
                                class="w-72 rounded-xl border shadow">

                        </div>

                    @endif



                    {{-- ==================================================
                    BASIC INFORMATION
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- BLOG TITLE --}}

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

                                value="{{ old('title', $blogPost->title) }}"

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('title')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>



                        {{-- BLOG SLUG --}}

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

                                value="{{ old('slug', $blogPost->slug) }}"

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('slug')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>



                        {{-- CATEGORY --}}

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

                                value="{{ old('category', $blogPost->category) }}"

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('category')

                                <p class="mt-2 text-sm text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                                        {{-- ==================================================
                    REPLACE FEATURED IMAGE
                    =================================================== --}}

                    <div>

                        <label
                            for="featured_image"
                            class="block text-sm font-semibold text-slate-700">

                            Replace Featured Image

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

                            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('excerpt', $blogPost->excerpt) }}</textarea>

                        @error('excerpt')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- ==================================================
                    BLOG CONTENT
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

                            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('content', $blogPost->content) }}</textarea>

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

                                value="{{ old('meta_title', $blogPost->meta_title) }}"

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                        </div>



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

                                class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('meta_description', $blogPost->meta_description) }}</textarea>

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

                            value="{{ old('tags', $blogPost->tags) }}"

                            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                    </div>



                    {{-- ==================================================
                    PUBLICATION SETTINGS
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <label class="flex items-center gap-3">

                            <input

                                type="checkbox"

                                name="featured"

                                value="1"

                                {{ old('featured', $blogPost->featured) ? 'checked' : '' }}

                                class="rounded border-slate-300 text-blue-600 shadow-sm">

                            <span>

                                Featured Blog Post

                            </span>

                        </label>



                        <label class="flex items-center gap-3">

                            <input

                                type="checkbox"

                                name="published"

                                value="1"

                                {{ old('published', $blogPost->published) ? 'checked' : '' }}

                                class="rounded border-slate-300 text-blue-600 shadow-sm">

                            <span>

                                Published

                            </span>

                        </label>

                    </div>



                    {{-- ==================================================
                    PUBLISH DATE
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

                            value="{{ old('published_at', optional($blogPost->published_at)->format('Y-m-d\TH:i')) }}"

                            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                    </div>



                    {{-- ==================================================
                    FORM ACTIONS
                    =================================================== --}}

                    <div class="flex items-center gap-4 pt-8 border-t">

                        <button

                            type="submit"

                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">

                            Update Blog Post

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
