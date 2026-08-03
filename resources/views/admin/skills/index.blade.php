{{-- ==========================================================
PAGE: SKILLS INDEX

File:
resources/views/admin/skills/index.blade.php

Purpose:
Displays all skills inside the Admin Dashboard.

Features:
• Search
• Pagination
• Flash Messages
• Featured Badge
• Progress Percentage
• View
• Edit
• Delete

========================================================== --}}

<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                Skills

            </h2>

            <a href="{{ route('skills.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                + Add Skill

            </a>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-admin.flash-message />

            <x-admin.card>

                <div class="p-6 border-b">

                    <form method="GET">

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search skills..."
                            class="w-full rounded-lg border-gray-300">

                    </form>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-3 text-left">

                                    Skill

                                </th>

                                <th class="px-6 py-3 text-left">

                                    Category

                                </th>

                                <th class="px-6 py-3 text-left">

                                    Percentage

                                </th>

                                <th class="px-6 py-3 text-left">

                                    Featured

                                </th>

                                <th class="px-6 py-3 text-right">

                                    Actions

                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-200"> @forelse ($skills as $skill)

                            <tr>

                                <td class="px-6 py-4 font-medium text-slate-800">

                                    {{ $skill->name }}

                                </td>

                                <td class="px-6 py-4 text-slate-600">

                                    {{ $skill->category }}

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-40 bg-gray-200 rounded-full h-3">

                                            <div class="bg-blue-600 h-3 rounded-full"
                                                style="width: {{ $skill->percentage }}%;">

                                            </div>

                                        </div>

                                        <span class="text-sm font-semibold text-slate-700">

                                            {{ $skill->percentage }}%

                                        </span>

                                    </div>

                                </td>

                                <td class="px-6 py-4">

                                    @if ($skill->featured)

                                        <span
                                            class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-medium">

                                            ★ Featured

                                        </span>

                                    @else

                                        <span class="inline-flex px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-sm">

                                            Normal

                                        </span>

                                    @endif

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-end gap-2">

                                        <a href="{{ route('skills.show', $skill) }}"
                                            class="px-3 py-2 bg-slate-700 hover:bg-slate-800 text-white rounded-lg">

                                            View

                                        </a>

                                        <a href="{{ route('skills.edit', $skill) }}"
                                            class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

                                            Edit

                                        </a>

                                        <form action="{{ route('skills.destroy', $skill) }}" method="POST"
                                            onsubmit="return confirm('Delete this skill?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                                <tr>

                                    <td colspan="5" class="px-6 py-10 text-center text-slate-500">

                                        No skills found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="p-6 border-t">

                    {{ $skills->links() }}

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>