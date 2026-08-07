{{-- ==========================================================
PAGE: EDIT EXPERIENCE

File:
resources/views/admin/experiences/edit.blade.php

Purpose:
Updates an existing work experience.

========================================================== --}}

<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Edit Experience

        </h2>

    </x-slot>

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <x-admin.card>

                <form
                    action="{{ route('experiences.update', $experience) }}"
                    method="POST"
                    class="p-8 space-y-8">

                    @csrf
                    @method('PUT')

                    {{-- ==========================================================
                    BASIC INFORMATION
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <label class="block font-medium mb-2">

                                Company

                            </label>

                            <input
                                type="text"
                                name="company"
                                value="{{ old('company', $experience->company) }}"
                                class="w-full rounded-lg border-gray-300">

                            @error('company')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <div>

                            <label class="block font-medium mb-2">

                                Position

                            </label>

                            <input
                                type="text"
                                name="position"
                                value="{{ old('position', $experience->position) }}"
                                class="w-full rounded-lg border-gray-300">

                            @error('position')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    {{-- ==========================================================
                    EMPLOYMENT & WORK MODE
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <label class="block font-medium mb-2">

                                Employment Type

                            </label>

                            <select
                                name="employment_type"
                                class="w-full rounded-lg border-gray-300">

                                <option value="">Select Employment Type</option>

                                <option value="Full-time"
                                    {{ old('employment_type', $experience->employment_type) == 'Full-time' ? 'selected' : '' }}>

                                    Full-time

                                </option>

                                <option value="Part-time"
                                    {{ old('employment_type', $experience->employment_type) == 'Part-time' ? 'selected' : '' }}>

                                    Part-time

                                </option>

                                <option value="Contract"
                                    {{ old('employment_type', $experience->employment_type) == 'Contract' ? 'selected' : '' }}>

                                    Contract

                                </option>

                                <option value="Internship"
                                    {{ old('employment_type', $experience->employment_type) == 'Internship' ? 'selected' : '' }}>

                                    Internship

                                </option>

                                <option value="Freelance"
                                    {{ old('employment_type', $experience->employment_type) == 'Freelance' ? 'selected' : '' }}>

                                    Freelance

                                </option>

                            </select>

                            @error('employment_type')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <div>

                            <label class="block font-medium mb-2">

                                Work Mode

                            </label>

                            <select
                                name="work_mode"
                                class="w-full rounded-lg border-gray-300">

                                <option value="Remote"
                                    {{ old('work_mode', $experience->work_mode) == 'Remote' ? 'selected' : '' }}>

                                    Remote

                                </option>

                                <option value="Hybrid"
                                    {{ old('work_mode', $experience->work_mode) == 'Hybrid' ? 'selected' : '' }}>

                                    Hybrid

                                </option>

                                <option value="On-site"
                                    {{ old('work_mode', $experience->work_mode) == 'On-site' ? 'selected' : '' }}>

                                    On-site

                                </option>

                            </select>

                            @error('work_mode')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                                        {{-- ==========================================================
                    LOCATION
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <label class="block font-medium mb-2">

                                City

                            </label>

                            <input
                                type="text"
                                name="city"
                                value="{{ old('city', $experience->city) }}"
                                class="w-full rounded-lg border-gray-300">

                            @error('city')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <div>

                            <label class="block font-medium mb-2">

                                Country

                            </label>

                            <input
                                type="text"
                                name="country"
                                value="{{ old('country', $experience->country) }}"
                                class="w-full rounded-lg border-gray-300">

                            @error('country')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    {{-- ==========================================================
                    EMPLOYMENT DATES
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <label class="block font-medium mb-2">

                                Start Date

                            </label>

                            <input
                                type="date"
                                name="start_date"
                                value="{{ old('start_date', $experience->start_date) }}"
                                class="w-full rounded-lg border-gray-300">

                            @error('start_date')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <div>

                            <label class="block font-medium mb-2">

                                End Date

                            </label>

                            <input
                                type="date"
                                name="end_date"
                                value="{{ old('end_date', $experience->end_date) }}"
                                class="w-full rounded-lg border-gray-300">

                            @error('end_date')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    <div>

                        <label class="inline-flex items-center gap-3">

                            <input
                                type="checkbox"
                                name="currently_working"
                                value="1"
                                {{ old('currently_working', $experience->currently_working) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">

                            <span>

                                I currently work here

                            </span>

                        </label>

                    </div>

                                        {{-- ==========================================================
                    DESCRIPTION
                    ========================================================== --}}

                    <div>

                        <label class="block font-medium mb-2">

                            Description

                        </label>

                        <textarea
                            name="description"
                            rows="8"
                            class="w-full rounded-lg border-gray-300">{{ old('description', $experience->description) }}</textarea>

                        @error('description')

                            <p class="text-red-600 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- ==========================================================
                    TECHNOLOGIES
                    ========================================================== --}}

                    <div>

                        <label class="block font-medium mb-2">

                            Technologies Used

                        </label>

                        <textarea
                            name="technologies"
                            rows="3"
                            placeholder="Laravel, PHP, MySQL, Tailwind CSS, Git..."
                            class="w-full rounded-lg border-gray-300">{{ old('technologies', $experience->technologies) }}</textarea>

                        @error('technologies')

                            <p class="text-red-600 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- ==========================================================
                    DISPLAY SETTINGS
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <label class="inline-flex items-center gap-3">

                                <input
                                    type="checkbox"
                                    name="featured"
                                    value="1"
                                    {{ old('featured', $experience->featured) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">

                                <span>

                                    Featured Experience

                                </span>

                            </label>

                        </div>

                        <div>

                            <label class="block font-medium mb-2">

                                Sort Order

                            </label>

                            <input
                                type="number"
                                name="sort_order"
                                value="{{ old('sort_order', $experience->sort_order) }}"
                                class="w-full rounded-lg border-gray-300">

                            @error('sort_order')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                                        {{-- ==========================================================
                    ACTION BUTTONS
                    ========================================================== --}}

                    <div class="flex justify-end gap-3 pt-8 border-t">

                        <a
                            href="{{ route('experiences.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                            Cancel

                        </a>

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">

                            Update Experience

                        </button>

                    </div>

                </form>

                {{-- ==========================================================
                DELETE EXPERIENCE
                (Separate form to avoid nested form issues)
                ========================================================== --}}

                <div class="px-8 pb-8">

                    <form
                        action="{{ route('experiences.destroy', $experience) }}"
                        method="POST"
                        onsubmit="return confirm('Delete this experience permanently?')">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">

                            Delete Experience

                        </button>

                    </form>

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>