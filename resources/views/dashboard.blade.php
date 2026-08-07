{{-- ==========================================================
| KaroDev Portfolio CMS
| Dashboard
|--------------------------------------------------------------
| Premium Admin Dashboard
|--------------------------------------------------------------
| Features
| • Welcome Hero
| • Live Statistics
| • Premium Analytics Cards
| • Quick Actions
| • Recent Activity
| • Portfolio Progress
| • Responsive Layout
========================================================== --}}

<x-app-layout>

    {{-- ======================================================
    PAGE HEADER
    ======================================================= --}}

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-2xl font-bold text-slate-800">

                    Dashboard

                </h2>

                <p class="text-slate-500 mt-1">

                    Portfolio Administration Panel

                </p>

            </div>

        </div>

    </x-slot>


    {{-- ======================================================
    PAGE CONTENT
    ======================================================= --}}

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">


            {{-- ==================================================
            HERO
            =================================================== --}}

            <section
                class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 p-10 shadow-2xl">

                <div class="absolute right-0 top-0 opacity-10 text-[220px] leading-none">

                    💻

                </div>

                <div class="relative z-10">

                    <h1 class="text-4xl font-black text-white">

                        Welcome back,

                        <span class="text-blue-400">

                            {{ Auth::user()->name }}

                        </span>

                    </h1>

                    <p class="mt-4 text-slate-300 max-w-3xl leading-8">

                        Manage every aspect of your portfolio from one
                        professional dashboard. Create projects, update
                        skills, publish blog posts, manage work experience,
                        certifications and much more.

                    </p>

                </div>

            </section>


            {{-- ==================================================
            STATISTICS
            =================================================== --}}

            <section class="mt-10">

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

                    {{-- ==========================================================
                    PROJECTS CARD
                    ========================================================== --}}

                    <a href="{{ route('projects.index') }}"
                        class="group rounded-2xl bg-blue-600 text-white p-7 shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="uppercase tracking-wider text-sm text-blue-100">

                                    Projects

                                </p>

                                <h2 class="mt-3 text-5xl font-black">

                                    {{ $projectCount }}

                                </h2>

                            </div>

                            <div class="text-5xl opacity-70 group-hover:scale-110 transition">

                                📦

                            </div>

                        </div>

                        <div class="mt-6 text-blue-100">

                            Manage Portfolio Projects →

                        </div>

                    </a>



                    {{-- ==========================================================
                    SKILLS CARD
                    ========================================================== --}}

                    <a href="{{ route('skills.index') }}"
                        class="group rounded-2xl bg-emerald-600 text-white p-7 shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="uppercase tracking-wider text-sm text-emerald-100">

                                    Skills

                                </p>

                                <h2 class="mt-3 text-5xl font-black">

                                    {{ $skillCount }}

                                </h2>

                            </div>

                            <div class="text-5xl opacity-70 group-hover:scale-110 transition">

                                🛠

                            </div>

                        </div>

                        <div class="mt-6 text-emerald-100">

                            Manage Skills →

                        </div>

                    </a>



                    {{-- ==========================================================
                    EXPERIENCE CARD
                    ========================================================== --}}

                    <a href="{{ route('experiences.index') }}"
                        class="group rounded-2xl bg-indigo-600 text-white p-7 shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="uppercase tracking-wider text-sm text-indigo-100">

                                    Experience

                                </p>

                                <h2 class="mt-3 text-5xl font-black">

                                    {{ $experienceCount }}

                                </h2>

                            </div>

                            <div class="text-5xl opacity-70 group-hover:scale-110 transition">

                                💼

                            </div>

                        </div>

                        <div class="mt-6 text-indigo-100">

                            Manage Experience →

                        </div>

                    </a>



                    {{-- ==========================================================
                    BLOG CARD
                    ========================================================== --}}

                    <a href="{{ route('blog-posts.index') }}"
                        class="group rounded-2xl bg-amber-500 text-white p-7 shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="uppercase tracking-wider text-sm text-yellow-100">

                                    Blog Posts

                                </p>

                                <h2 class="mt-3 text-5xl font-black">

                                    {{ $blogCount }}

                                </h2>

                            </div>

                            <div class="text-5xl opacity-70 group-hover:scale-110 transition">

                                ✍️

                            </div>

                        </div>

                        <div class="mt-6 text-yellow-100">

                            Manage Blog →

                        </div>

                    </a>

                </div>

            </section>

            {{-- ==========================================================
            QUICK ACTIONS
            ========================================================== --}}

            <section class="mt-14">

                <div class="flex items-center justify-between mb-8">

                    <div>

                        <h2 class="text-3xl font-bold text-slate-800">

                            Quick Actions

                        </h2>

                        <p class="text-slate-500 mt-2">

                            Jump directly into the modules you use most.

                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">


                    {{-- ==================================================
                    PROJECTS
                    =================================================== --}}

                    <a href="{{ route('projects.index') }}"
                        class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-3xl">

                                📦

                            </div>

                            <span class="text-slate-300 group-hover:text-blue-600 transition text-3xl">

                                →

                            </span>

                        </div>

                        <h3 class="mt-6 text-xl font-bold text-slate-800">

                            Projects

                        </h3>

                        <p class="mt-2 text-slate-500">

                            Manage portfolio applications.

                        </p>

                    </a>



                    {{-- ==================================================
                    EXPERIENCE
                    =================================================== --}}

                    <a href="{{ route('experiences.index') }}"
                        class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center text-3xl">

                                💼

                            </div>

                            <span class="text-slate-300 group-hover:text-indigo-600 transition text-3xl">

                                →

                            </span>

                        </div>

                        <h3 class="mt-6 text-xl font-bold text-slate-800">

                            Experience

                        </h3>

                        <p class="mt-2 text-slate-500">

                            Manage work history.

                        </p>

                    </a>



                    {{-- ==================================================
                    SKILLS
                    =================================================== --}}

                    <a href="{{ route('skills.index') }}"
                        class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center text-3xl">

                                🛠

                            </div>

                            <span class="text-slate-300 group-hover:text-emerald-600 transition text-3xl">

                                →

                            </span>

                        </div>

                        <h3 class="mt-6 text-xl font-bold text-slate-800">

                            Skills

                        </h3>

                        <p class="mt-2 text-slate-500">

                            Update technical skills.

                        </p>

                    </a>



                    {{-- ==================================================
                    BLOG
                    =================================================== --}}

                    <a href="{{ route('blog-posts.index') }}"
                        class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-14 h-14 rounded-xl bg-amber-100 flex items-center justify-center text-3xl">

                                ✍️

                            </div>

                            <span class="text-slate-300 group-hover:text-amber-500 transition text-3xl">

                                →

                            </span>

                        </div>

                        <h3 class="mt-6 text-xl font-bold text-slate-800">

                            Blog

                        </h3>

                        <p class="mt-2 text-slate-500">

                            Publish articles.

                        </p>

                    </a>



                    {{-- ==================================================
                    MESSAGES
                    =================================================== --}}

                    <a href="#"
                        class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-14 h-14 rounded-xl bg-rose-100 flex items-center justify-center text-3xl">

                                📩

                            </div>

                            <span class="text-slate-300 group-hover:text-rose-600 transition text-3xl">

                                →

                            </span>

                        </div>

                        <h3 class="mt-6 text-xl font-bold text-slate-800">

                            Messages

                        </h3>

                        <p class="mt-2 text-slate-500">

                            View contact enquiries.

                        </p>

                    </a>



                    {{-- ==================================================
                    SETTINGS
                    =================================================== --}}

                    <a href="#"
                        class="group bg-white rounded-2xl border border-slate-200 p-7 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-14 h-14 rounded-xl bg-slate-100 flex items-center justify-center text-3xl">

                                ⚙️

                            </div>

                            <span class="text-slate-300 group-hover:text-slate-700 transition text-3xl">

                                →

                            </span>

                        </div>

                        <h3 class="mt-6 text-xl font-bold text-slate-800">

                            Settings

                        </h3>

                        <p class="mt-2 text-slate-500">

                            Configure portfolio.

                        </p>

                    </a>

                </div>

            </section>

            {{-- ==========================================================
            DASHBOARD INFORMATION
            ========================================================== --}}

            <section class="mt-14">

                <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

                    {{-- ======================================================
                    PORTFOLIO PROGRESS
                    ======================================================= --}}

                    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-8">

                        <h2 class="text-2xl font-bold text-slate-800">

                            Portfolio Progress

                        </h2>

                        <p class="text-slate-500 mt-2">

                            Current development status of your portfolio.

                        </p>

                        <div class="mt-8 space-y-6">

                            <div>

                                <div class="flex justify-between mb-2">

                                    <span class="font-medium text-slate-700">

                                        CMS Development

                                    </span>

                                    <span class="font-semibold text-blue-600">

                                        70%

                                    </span>

                                </div>

                                <div class="w-full h-3 bg-slate-200 rounded-full">

                                    <div class="h-3 bg-blue-600 rounded-full w-[70%]"></div>

                                </div>

                            </div>

                            <div>

                                <div class="flex justify-between mb-2">

                                    <span class="font-medium text-slate-700">

                                        Portfolio Content

                                    </span>

                                    <span class="font-semibold text-emerald-600">

                                        45%

                                    </span>

                                </div>

                                <div class="w-full h-3 bg-slate-200 rounded-full">

                                    <div class="h-3 bg-emerald-600 rounded-full w-[45%]"></div>

                                </div>

                            </div>

                            <div>

                                <div class="flex justify-between mb-2">

                                    <span class="font-medium text-slate-700">

                                        Testing

                                    </span>

                                    <span class="font-semibold text-amber-600">

                                        20%

                                    </span>

                                </div>

                                <div class="w-full h-3 bg-slate-200 rounded-full">

                                    <div class="h-3 bg-amber-500 rounded-full w-[20%]"></div>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- ======================================================
                    SYSTEM STATUS
                    ======================================================= --}}

                    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-8">

                        <h2 class="text-2xl font-bold text-slate-800">

                            System Status

                        </h2>

                        <p class="text-slate-500 mt-2">

                            Current application information.

                        </p>

                        <div class="mt-8 divide-y divide-slate-200">

                            <div class="flex justify-between py-4">

                                <span class="text-slate-600">

                                    Laravel

                                </span>

                                <span class="font-semibold text-emerald-600">

                                    13.x

                                </span>

                            </div>

                            <div class="flex justify-between py-4">

                                <span class="text-slate-600">

                                    PHP

                                </span>

                                <span class="font-semibold">

                                    {{ PHP_VERSION }}

                                </span>

                            </div>

                            <div class="flex justify-between py-4">

                                <span class="text-slate-600">

                                    Environment

                                </span>

                                <span class="font-semibold text-blue-600">

                                    {{ app()->environment() }}

                                </span>

                            </div>

                            <div class="flex justify-between py-4">

                                <span class="text-slate-600">

                                    Portfolio CMS

                                </span>

                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                                    Running

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

            {{-- ==========================================================
            FOOTER
            ========================================================== --}}

            <div class="mt-16 text-center">

                <p class="text-sm text-slate-400">

                    KaroDev Portfolio CMS • Version 1.0

                </p>

            </div>

        </div>

    </div>

    </div>

</x-app-layout>