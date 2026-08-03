{{-- ==========================================================
PAGE: VIEW BLOG POST

File:
resources/views/admin/blog/show.blade.php

Purpose:
Displays the complete details of a single blog post
inside the KaroDev Admin Dashboard.

Responsibilities:
• Display featured image
• Display blog information
• Display article content
• Display SEO information
• Display tags
• Display publication status

========================================================== --}}

<x-app-layout>

    {{-- =========================================================
    DASHBOARD PAGE HEADER
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            View Blog Post

        </h2>

    </x-slot>



    {{-- =========================================================
    MAIN PAGE
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <x-admin.card>

                {{-- =====================================================
                PAGE HEADER
                ====================================================== --}}

                <div class="border-b p-6">

                    <h1 class="text-3xl font-bold text-slate-800">

                        {{ $blogPost->title }}

                    </h1>

                    <p class="mt-2 text-slate-600">

                        Complete blog post information.

                    </p>

                </div>



                <div class="p-8 space-y-8">

                    {{-- ==================================================
                    BLOG INFORMATION
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- CATEGORY --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Category

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $blogPost->category }}

                            </p>

                        </div>



                        {{-- PUBLICATION DATE --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Published At

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ optional($blogPost->published_at)->format('F d, Y • h:i A') }}

                            </p>

                        </div>

                    </div>



                    {{-- ==================================================
                    STATUS BADGES
                    =================================================== --}}

                    <div class="flex flex-wrap gap-4">

                        @if ($blogPost->featured)

                            <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-medium">

                                ★ Featured Blog

                            </span>

                        @endif



                        @if ($blogPost->published)

                            <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-medium">

                                Published

                            </span>

                        @else

                            <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-medium">

                                Draft

                            </span>

                        @endif

                    </div>



                    {{-- ==================================================
                    FEATURED IMAGE
                    =================================================== --}}

                    @if ($blogPost->featured_image)

                        <div>

                            <img src="{{ asset('storage/' . $blogPost->featured_image) }}" alt="{{ $blogPost->title }}"
                                class="w-full max-w-4xl rounded-xl border shadow">

                        </div>

                    @endif

                    {{-- ==================================================
                    SHORT EXCERPT
                    =================================================== --}}

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800 mb-4">

                            Short Excerpt

                        </h3>

                        <p class="text-slate-700 leading-relaxed">

                            {{ $blogPost->excerpt }}

                        </p>

                    </div>



                    {{-- ==================================================
                    FULL ARTICLE
                    =================================================== --}}

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800 mb-4">

                            Blog Content

                        </h3>

                        <div class="prose max-w-none text-slate-700">

                            {!! nl2br(e($blogPost->content)) !!}

                        </div>

                    </div>



                    {{-- ==================================================
                    SEO INFORMATION
                    =================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- META TITLE --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Meta Title

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $blogPost->meta_title ?: 'Not specified' }}

                            </p>

                        </div>



                        {{-- META DESCRIPTION --}}

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Meta Description

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $blogPost->meta_description ?: 'Not specified' }}

                            </p>

                        </div>

                    </div>



                    {{-- ==================================================
                    TAGS
                    =================================================== --}}

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800 mb-4">

                            Tags

                        </h3>

                        <p class="text-slate-600">

                            {{ $blogPost->tags ?: 'No tags assigned.' }}

                        </p>

                    </div>



                    {{-- ==================================================
                    PAGE ACTIONS

                    Purpose:
                    Provides quick navigation back to the Blog list
                    or directly edit this blog post.
                    =================================================== --}}

                    <div class="flex items-center gap-4 pt-8 border-t">

                        <a href="{{ route('blog-posts.index') }}"
                            class="px-5 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg transition">

                            ← Back to Blog Posts

                        </a>

                        <a href="{{ route('blog-posts.edit', $blogPost) }}"
                            class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">

                            Edit Blog Post

                        </a>

                    </div>

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>