{{-- ==========================================================
PAGE: BLOG MANAGEMENT

File:
resources/views/admin/blog/index.blade.php

Purpose:
Displays every blog post stored in the database.

Responsibilities:
• List all blog posts
• Search blog posts
• Display featured images
• Display categories
• Display publication status
• Navigate to Create Blog page
• View/Edit/Delete blog posts

CRUD Progress:
✔ Create
✔ Read
✔ Update
✔ Delete

========================================================== --}}

<x-app-layout>

    {{-- =========================================================
    DASHBOARD HEADER
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Blog Management

        </h2>

    </x-slot>



    {{-- =========================================================
    MAIN PAGE
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-admin.card>

                {{-- =====================================================
                PAGE HEADER
                ====================================================== --}}

                <div class="flex items-center justify-between p-6 border-b">

                    <div>

                        <h1 class="text-3xl font-bold text-slate-800">

                            Blog Posts

                        </h1>

                        <p class="mt-2 text-slate-600">

                            Manage all articles published on your portfolio.

                        </p>

                    </div>

                    <a
                        href="{{ route('blog-posts.create') }}"
                        class="px-5 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">

                        + New Blog Post

                    </a>

                </div>



                {{-- =====================================================
                FLASH MESSAGES
                ====================================================== --}}

                <x-flash-message />



                {{-- =====================================================
                SEARCH BAR
                ====================================================== --}}

                <div class="p-6 border-b">

                    <form
                        action="{{ route('blog-posts.index') }}"
                        method="GET">

                        <div class="flex gap-4">

                            <input

                                type="text"

                                name="search"

                                value="{{ request('search') }}"

                                placeholder="Search by title, category or tags..."

                                class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            <button

                                type="submit"

                                class="px-6 py-2 bg-slate-800 text-white rounded-lg hover:bg-slate-900 transition">

                                Search

                            </button>

                        </div>

                    </form>

                </div>



                {{-- =====================================================
                BLOG TABLE
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

                                    Category

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Published

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Featured

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Actions

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($blogPosts as $blogPost)

                                <tr class="border-b hover:bg-slate-50 transition">
                                    {{-- ==========================================================
                                    FEATURED IMAGE
                                    ========================================================== --}}

                                    <td class="px-6 py-4 text-center">

                                        @if ($blogPost->featured_image)

                                            <img
                                                src="{{ asset('storage/' . $blogPost->featured_image) }}"
                                                alt="{{ $blogPost->title }}"
                                                class="w-16 h-16 object-cover rounded-lg border mx-auto">

                                        @else

                                            <span class="text-slate-400 text-sm">

                                                No Image

                                            </span>

                                        @endif

                                    </td>



                                    {{-- ==========================================================
                                    BLOG TITLE
                                    ========================================================== --}}

                                    <td class="px-6 py-4 font-semibold text-slate-800">

                                        {{ $blogPost->title }}

                                    </td>



                                    {{-- ==========================================================
                                    CATEGORY
                                    ========================================================== --}}

                                    <td class="px-6 py-4">

                                        {{ $blogPost->category }}

                                    </td>



                                    {{-- ==========================================================
                                    PUBLICATION STATUS
                                    ========================================================== --}}

                                    <td class="px-6 py-4 text-center">

                                        @if ($blogPost->published)

                                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                                                Published

                                            </span>

                                        @else

                                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">

                                                Draft

                                            </span>

                                        @endif

                                    </td>



                                    {{-- ==========================================================
                                    FEATURED STATUS
                                    ========================================================== --}}

                                    <td class="px-6 py-4 text-center">

                                        @if ($blogPost->featured)

                                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">

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

                                            {{-- View Blog Post --}}

                                            <a
                                                href="{{ route('blog-posts.show', $blogPost) }}"
                                                class="text-green-600 hover:text-green-800 font-medium">

                                                View

                                            </a>

                                            {{-- Edit Blog Post --}}

                                            <a
                                                href="{{ route('blog-posts.edit', $blogPost) }}"
                                                class="text-blue-600 hover:text-blue-800 font-medium">

                                                Edit

                                            </a>

                                            {{-- Delete Blog Post --}}

                                            <form
                                                action="{{ route('blog-posts.destroy', $blogPost) }}"
                                                method="POST"
                                                class="inline">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this blog post?')"
                                                    class="text-red-600 hover:text-red-800 font-medium">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="px-6 py-12 text-center text-slate-500">

                                        No blog posts found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>



                {{-- =====================================================
                PAGINATION
                ====================================================== --}}

                <div class="p-6">

                    {{ $blogPosts->links() }}

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>