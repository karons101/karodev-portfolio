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

========================================================== --}}

<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            View Project

        </h2>

    </x-slot>

    <div class="py-12">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <x-admin.card>

                {{-- ======================================================
                     PAGE HEADER
                ======================================================= --}}

                <div class="border-b p-6">

                    <h1 class="text-3xl font-bold text-slate-800">

                        {{ $project->title }}

                    </h1>

                    <p class="mt-2 text-slate-600">

                        Complete project information.

                    </p>

                </div>

                <div class="p-8 space-y-8">

                    {{-- ==========================================================
                         PROJECT IMAGE
                    ========================================================== --}}

                    @if ($project->image)

                        <div>

                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="w-full max-w-3xl rounded-xl border shadow">

                        </div>

                    @endif



                    {{-- ==========================================================
                         PROJECT INFORMATION
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Technology

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $project->technology }}

                            </p>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Category

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $project->category }}

                            </p>

                        </div>

                    </div>



                    {{-- ==========================================================
                         PROJECT LINKS
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                GitHub Repository

                            </h3>

                            <a
                                href="{{ $project->github_url }}"
                                target="_blank"
                                class="text-blue-600 hover:underline break-all">

                                {{ $project->github_url }}

                            </a>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Live Demo

                            </h3>

                            <a
                                href="{{ $project->live_demo_url }}"
                                target="_blank"
                                class="text-blue-600 hover:underline break-all">

                                {{ $project->live_demo_url }}

                            </a>

                        </div>

                    </div>



                    {{-- ==========================================================
                         PROJECT DESCRIPTION
                    ========================================================== --}}

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800 mb-4">

                            Short Description

                        </h3>

                        <p class="text-slate-700 leading-relaxed">

                            {{ $project->short_description }}

                        </p>

                    </div>



                    <div>

                        <h3 class="text-lg font-semibold text-slate-800 mb-4">

                            Full Description

                        </h3>

                        <div class="prose max-w-none text-slate-700">

                            {{ $project->description }}

                        </div>

                    </div>

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>