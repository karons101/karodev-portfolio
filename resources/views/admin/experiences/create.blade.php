{{-- ==========================================================
PAGE: CREATE EXPERIENCE

Creates a new work experience.
========================================================== --}}

<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Add Experience

        </h2>

    </x-slot>

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <x-admin.card>

                <form action="{{ route('experiences.store') }}" method="POST" class="p-8 space-y-8">

                    @csrf

                    {{-- ==========================================================
                    BASIC INFORMATION
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <label class="block font-medium mb-2">

                                Company

                            </label>

                            <input type="text" name="company" value="{{ old('company') }}"
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

                            <input type="text" name="position" value="{{ old('position') }}"
                                class="w-full rounded-lg border-gray-300">

                            @error('position')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    {{-- ==========================================================
                    EMPLOYMENT & LOCATION
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <label class="block font-medium mb-2">

                                Employment Type

                            </label>

                            <select name="employment_type" class="w-full rounded-lg border-gray-300">

                                <option value="">Select Employment Type</option>

                                <option value="Full-time" {{ old('employment_type') == 'Full-time' ? 'selected' : '' }}>

                                    Full-time

                                </option>

                                <option value="Part-time" {{ old('employment_type') == 'Part-time' ? 'selected' : '' }}>

                                    Part-time

                                </option>

                                <option value="Contract" {{ old('employment_type') == 'Contract' ? 'selected' : '' }}>

                                    Contract

                                </option>

                                <option value="Internship" {{ old('employment_type') == 'Internship' ? 'selected' : '' }}>

                                    Internship

                                </option>

                                <option value="Freelance" {{ old('employment_type') == 'Freelance' ? 'selected' : '' }}>

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

                            <select name="work_mode" class="w-full rounded-lg border-gray-300">

                                <option value="Remote" {{ old('work_mode') == 'Remote' ? 'selected' : '' }}>

                                    Remote

                                </option>

                                <option value="Hybrid" {{ old('work_mode') == 'Hybrid' ? 'selected' : '' }}>

                                    Hybrid

                                </option>

                                <option value="On-site" {{ old('work_mode') == 'On-site' ? 'selected' : '' }}>

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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <label class="block font-medium mb-2">

                                City

                            </label>

                            <input type="text" name="city" value="{{ old('city') }}"
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

                            <input type="text" name="country" value="{{ old('country') }}"
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

                            <input type="date" name="start_date" value="{{ old('start_date') }}"
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

                            <input type="date" name="end_date" value="{{ old('end_date') }}"
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
                                type="hidden" 
                                name="currently_working" 
                                value="0">

                            <input 
                                type="checkbox" 
                                name="currently_working" 
                                value="1" {{ old('currently_working') ? 'checked' : '' }} 
                                class="rounded border-gray-300">

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

                            Job Description

                        </label>

                        <textarea name="description" rows="8"
                            class="w-full rounded-lg border-gray-300">{{ old('description') }}</textarea>

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

                        <input type="text" name="technologies" value="{{ old('technologies') }}"
                            placeholder="Laravel, PHP, MySQL, Tailwind CSS, Git..."
                            class="w-full rounded-lg border-gray-300">

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

                            <label class="block font-medium mb-2">

                                Sort Order

                            </label>

                            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                                class="w-full rounded-lg border-gray-300">

                            @error('sort_order')

                                <p class="text-red-600 mt-1">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <div class="flex items-end">

                            <label class="inline-flex items-center gap-3">

                                <input type="hidden" name="featured" value="0">

                                <input
                                    type="checkbox"
                                    name="featured"
                                    value="1"
                                    {{ old('featured') ? 'checked' : '' }}
                                    class="rounded border-gray-300">

                                <span>

                                    Featured Position

                                </span>

                            </label>

                        </div>

                    </div>

                    {{-- ==========================================================
                    ACTION BUTTONS
                    ========================================================== --}}

                    <div class="flex justify-end gap-4 pt-6 border-t">

                        <a href="{{ route('experiences.index') }}"
                            class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">

                            Cancel

                        </a>

                        <button type="submit"
                            class="px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-medium">

                            Save Experience

                        </button>

                    </div>

                </form>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>