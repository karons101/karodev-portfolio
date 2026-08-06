{{-- ==========================================================
PAGE: VIEW SKILL

File:
resources/views/admin/skills/show.blade.php

Purpose:
Displays the complete details of one Skill.

========================================================== --}}

<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                View Skill

            </h2>

            <a
                href="{{ route('skills.index') }}"
                class="bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-lg">

                ← Back

            </a>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <x-admin.card>

                <div class="p-8 space-y-8">

                    {{-- ==========================================================
                    BASIC INFORMATION
                    ========================================================== --}}

                    <div>

                        <h3 class="text-2xl font-bold text-slate-800">

                            {{ $skill->name }}

                        </h3>

                        <p class="mt-2 text-slate-600">

                            {{ $skill->category }}

                        </p>

                    </div>

                    {{-- ==========================================================
                    SKILL LEVEL
                    ========================================================== --}}

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800 mb-4">

                            Skill Level

                        </h3>

                        <div class="flex items-center gap-4">

                            <div class="flex-1 bg-gray-200 rounded-full h-5">

                                <div
                                    class="bg-blue-600 h-5 rounded-full"
                                    style="width: {{ $skill->percentage }}%;">

                                </div>

                            </div>

                            <span class="font-bold text-lg text-blue-700">

                                {{ $skill->percentage }}%

                            </span>

                        </div>

                    </div>


                    {{-- ==========================================================
                    DISPLAY INFORMATION
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Icon

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $skill->icon ?: 'No icon assigned' }}

                            </p>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Sort Order

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $skill->sort_order }}

                            </p>

                        </div>

                    </div>

                    {{-- ==========================================================
                    STATUS
                    ========================================================== --}}

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800">

                            Featured Status

                        </h3>

                        <div class="mt-3">

                            @if ($skill->featured)

                                <span
                                    class="inline-flex px-4 py-2 rounded-full bg-green-100 text-green-700 font-medium">

                                    ★ Featured Skill

                                </span>

                            @else

                                <span
                                    class="inline-flex px-4 py-2 rounded-full bg-gray-100 text-gray-700 font-medium">

                                    Normal Skill

                                </span>

                            @endif

                        </div>

                    </div>

                    {{-- ==========================================================
                    RECORD INFORMATION
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Created

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $skill->created_at->format('F d, Y \\a\\t h:i A') }}

                            </p>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">

                                Last Updated

                            </h3>

                            <p class="mt-2 text-slate-600">

                                {{ $skill->updated_at->format('F d, Y \\a\\t h:i A') }}

                            </p>

                        </div>

                    </div>

                    {{-- ==========================================================
                    PAGE ACTIONS
                    ========================================================== --}}

                    <div class="flex items-center gap-4 pt-8 border-t">

                        <a
                            href="{{ route('skills.index') }}"
                            class="px-5 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg transition">

                            ← Back to Skills

                        </a>

                        <a
                            href="{{ route('skills.edit', $skill) }}"
                            class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">

                            Edit Skill

                        </a>

                    </div>

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>