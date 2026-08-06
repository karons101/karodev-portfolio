{{-- ==========================================================
PAGE: VIEW EXPERIENCE

Displays one Experience record.

========================================================== --}}

<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                View Experience

            </h2>

            <a href="{{ route('experiences.index') }}"
                class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg">

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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-sm font-semibold text-gray-500 uppercase">

                                Company

                            </h3>

                            <p class="mt-2 text-lg font-semibold">

                                {{ $experience->company }}

                            </p>

                        </div>

                        <div>

                            <h3 class="text-sm font-semibold text-gray-500 uppercase">

                                Position

                            </h3>

                            <p class="mt-2 text-lg">

                                {{ $experience->position }}

                            </p>

                        </div>

                    </div>

                    {{-- ==========================================================
                    EMPLOYMENT
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-sm font-semibold text-gray-500 uppercase">

                                Employment Type

                            </h3>

                            <p class="mt-2">

                                {{ $experience->employment_type }}

                            </p>

                        </div>

                        <div>

                            <h3 class="text-sm font-semibold text-gray-500 uppercase">

                                Work Mode

                            </h3>

                            <p class="mt-2">

                                {{ $experience->work_mode }}

                            </p>

                        </div>

                    </div>

                    {{-- ==========================================================
                    LOCATION
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-sm font-semibold text-gray-500 uppercase">

                                City

                            </h3>

                            <p class="mt-2">

                                {{ $experience->city ?: '-' }}

                            </p>

                        </div>

                        <div>

                            <h3 class="text-sm font-semibold text-gray-500 uppercase">

                                Country

                            </h3>

                            <p class="mt-2">

                                {{ $experience->country ?: '-' }}

                            </p>

                        </div>

                    </div>

                    {{-- ==========================================================
                    DATES
                    ========================================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-sm font-semibold text-gray-500 uppercase">

                                Employment Period

                            </h3>

                            <p class="mt-2">

                                {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}

                                —

                                @if ($experience->currently_working)

                                    <span class="font-semibold text-green-600">

                                        Present

                                    </span>

                                @else

                                    {{ $experience->end_date
                                      ? \Carbon\Carbon::parse($experience->end_date)->format('M Y')
                                      : '-' }}

                                @endif

                            </p>

                        </div>

                        <div>

                            <h3 class="text-sm font-semibold text-gray-500 uppercase">

                                Featured

                            </h3>

                            <p class="mt-2">

                                @if ($experience->featured)

                                    <span
                                        class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 font-medium">

                                        ★ Featured

                                    </span>

                                @else

                                    <span class="inline-flex px-3 py-1 rounded-full bg-gray-100 text-gray-600">

                                        Normal

                                    </span>

                                @endif

                            </p>

                        </div>

                    </div>

                    {{-- ==========================================================
                    DESCRIPTION
                    ========================================================== --}}

                    <div>

                        <h3 class="text-sm font-semibold text-gray-500 uppercase">

                            Description

                        </h3>

                        <div class="mt-3 whitespace-pre-line leading-7 text-slate-700">

                            {{ $experience->description }}

                        </div>

                    </div>

                    {{-- ==========================================================
                    TECHNOLOGIES
                    ========================================================== --}}

                    <div>

                        <h3 class="text-sm font-semibold text-gray-500 uppercase">

                            Technologies

                        </h3>

                        <p class="mt-2">

                            {{ $experience->technologies ?: '-' }}

                        </p>

                    </div>

                    {{-- ==========================================================
                    ACTIONS
                    ========================================================== --}}

                    <div class="flex justify-end gap-3 pt-6 border-t">

                        <a href="{{ route('experiences.edit', $experience) }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                            Edit Experience

                        </a>

                        <form action="{{ route('experiences.destroy', $experience) }}" method="POST"
                            onsubmit="return confirm('Delete this experience?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>