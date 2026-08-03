{{-- ==========================================================
PAGE: EDIT SKILL

File:
resources/views/admin/skills/edit.blade.php

Purpose:
Edit an existing skill.

========================================================== --}}

<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Edit Skill

        </h2>

    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <x-admin.card>

                <form
                    action="{{ route('skills.update', $skill) }}"
                    method="POST"
                    class="p-8 space-y-6">

                    @csrf
                    @method('PUT')

                    {{-- ==========================================================
                    BASIC INFORMATION
                    ========================================================== --}}

                    <div>

                        <label class="block font-medium mb-2">

                            Skill Name

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $skill->name) }}"
                            class="w-full rounded-lg border-gray-300">

                        @error('name')

                            <p class="text-red-600 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    <div>

                        <label class="block font-medium mb-2">

                            Category

                        </label>

                        <input
                            type="text"
                            name="category"
                            value="{{ old('category', $skill->category) }}"
                            class="w-full rounded-lg border-gray-300">

                        @error('category')

                            <p class="text-red-600 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    <div>

                        <label class="block font-medium mb-2">

                            Skill Percentage

                        </label>

                        <input
                            type="number"
                            name="percentage"
                            value="{{ old('percentage', $skill->percentage) }}"
                            min="0"
                            max="100"
                            class="w-full rounded-lg border-gray-300">

                        @error('percentage')

                            <p class="text-red-600 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                                        {{-- ==========================================================
                    DISPLAY SETTINGS
                    ========================================================== --}}

                    <div>

                        <label class="block font-medium mb-2">

                            Icon

                        </label>

                        <input
                            type="text"
                            name="icon"
                            value="{{ old('icon', $skill->icon) }}"
                            placeholder="fa-brands fa-laravel"
                            class="w-full rounded-lg border-gray-300">

                        @error('icon')

                            <p class="text-red-600 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    <div>

                        <label class="block font-medium mb-2">

                            Sort Order

                        </label>

                        <input
                            type="number"
                            name="sort_order"
                            value="{{ old('sort_order', $skill->sort_order) }}"
                            min="0"
                            class="w-full rounded-lg border-gray-300">

                        @error('sort_order')

                            <p class="text-red-600 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    <div class="flex items-center gap-3">

                        <input
                            type="checkbox"
                            id="featured"
                            name="featured"
                            value="1"
                            {{ old('featured', $skill->featured) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">

                        <label for="featured" class="font-medium">

                            Featured Skill

                        </label>

                    </div>

                    {{-- ==========================================================
                    ACTION BUTTONS
                    ========================================================== --}}

                    <div class="flex items-center gap-4 pt-6 border-t">

                        <button
                            type="submit"
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">

                            Update Skill

                        </button>

                        <a
                            href="{{ route('skills.index') }}"
                            class="px-6 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg transition">

                            Cancel

                        </a>

                    </div>

                </form>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>