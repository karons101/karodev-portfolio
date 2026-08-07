{{-- ==========================================================
PAGE: EXPERIENCE INDEX

Displays all work experiences
inside the Admin Dashboard.
========================================================== --}}

<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                Experience

            </h2>

            <a href="{{ route('experiences.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                + Add Experience

            </a>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-admin.flash-message />


            {{-- ==========================================================
            EXPERIENCE STATISTICS
            ========================================================== --}}

            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2 xl:grid-cols-4">

                {{-- Total Experiences --}}
                <div class="rounded-xl bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Total Experiences

                    </p>

                    <h3 class="mt-2 text-3xl font-bold text-slate-800">

                        {{ $experiences->total() }}

                    </h3>

                </div>

                {{-- Current Positions --}}
                <div class="rounded-xl bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Current Positions

                    </p>

                    <h3 class="mt-2 text-3xl font-bold text-green-600">

                        {{ \App\Models\Experience::where('currently_working', true)->count() }}

                    </h3>

                </div>

                {{-- Featured --}}
                <div class="rounded-xl bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Featured

                    </p>

                    <h3 class="mt-2 text-3xl font-bold text-blue-600">

                        {{ \App\Models\Experience::where('featured', true)->count() }}

                    </h3>

                </div>

                {{-- Previous Positions --}}
                <div class="rounded-xl bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Previous Positions

                    </p>

                    <h3 class="mt-2 text-3xl font-bold text-orange-600">

                        {{ \App\Models\Experience::where('currently_working', false)->count() }}

                    </h3>

                </div>

            </div>

            <x-admin.card>

                <div class="p-6 border-b">

                    <form method="GET">

                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search company or position..." class="w-full rounded-lg border-gray-300">

                    </form>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-3 text-left">

                                    Company

                                </th>

                                <th class="px-6 py-3 text-left">

                                    Position

                                </th>

                                <th class="px-6 py-3 text-left">

                                    Location

                                </th>

                                <th class="px-6 py-3 text-left">

                                    Work Mode

                                </th>

                                <th class="px-6 py-3 text-left">

                                    Status

                                </th>

                                <th class="px-6 py-3 text-left">

                                    Featured

                                </th>

                                <th class="px-6 py-3 text-left">

                                    Sort

                                </th>

                                <th class="px-6 py-3 text-right">

                                    Actions

                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-200">

                            @forelse ($experiences as $experience)

                                <tr class="hover:bg-slate-50 transition">

                                    {{-- Company --}}
                                    <td class="px-6 py-4">

                                        <div class="font-semibold text-slate-800">

                                            {{ $experience->company }}

                                        </div>

                                    </td>

                                    {{-- Position --}}
                                    <td class="px-6 py-4">

                                        <div class="font-medium text-slate-700">

                                            {{ $experience->position }}

                                        </div>

                                        <div class="text-sm text-slate-500">

                                            {{ $experience->employment_type }}

                                        </div>

                                    </td>

                                    {{-- Location --}}
                                    <td class="px-6 py-4 text-slate-600">

                                        {{ $experience->city ?: '-' }}

                                        @if($experience->city && $experience->country)

                                            ,

                                        @endif

                                        {{ $experience->country ?: '' }}

                                    </td>

                                    {{-- Work Mode --}}
                                    <td class="px-6 py-4">

                                        @if($experience->work_mode == 'Remote')

                                            <span
                                                class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700">

                                                Remote

                                            </span>

                                        @elseif($experience->work_mode == 'Hybrid')

                                            <span
                                                class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-sm font-medium text-yellow-700">

                                                Hybrid

                                            </span>

                                        @else

                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-700">

                                                On-site

                                            </span>

                                        @endif

                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4">

                                        @if($experience->currently_working)

                                            <span
                                                class="inline-flex rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">

                                                Current

                                            </span>

                                        @else

                                            <span
                                                class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-sm font-medium text-slate-700">

                                                Past

                                            </span>

                                        @endif

                                    </td>

                                    {{-- Featured --}}
                                    <td class="px-6 py-4">

                                        @if($experience->featured)

                                            <span
                                                class="inline-flex rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">

                                                ★ Featured

                                            </span>

                                        @else

                                            <span class="text-slate-400">

                                                —

                                            </span>

                                        @endif

                                    </td>

                                    {{-- Sort Order --}}
                                    <td class="px-6 py-4 text-slate-600">

                                        {{ $experience->sort_order }}

                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-4">

                                        <div class="flex justify-end gap-2">

                                            <a href="{{ route('experiences.show', $experience) }}"
                                                class="rounded-lg bg-slate-700 px-3 py-2 text-white hover:bg-slate-800">

                                                View

                                            </a>

                                            <a href="{{ route('experiences.edit', $experience) }}"
                                                class="rounded-lg bg-blue-600 px-3 py-2 text-white hover:bg-blue-700">

                                                Edit

                                            </a>

                                            <form action="{{ route('experiences.destroy', $experience) }}" method="POST"
                                                onsubmit="return confirm('Delete this experience?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-lg bg-red-600 px-3 py-2 text-white hover:bg-red-700">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="px-6 py-10 text-center text-slate-500">

                                        No experience records found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="p-6 border-t">

                    {{ $experiences->links() }}

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>