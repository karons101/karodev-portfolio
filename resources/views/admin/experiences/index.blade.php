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
                                    Employment
                                </th>

                                <th class="px-6 py-3 text-left">
                                    Period
                                </th>

                                <th class="px-6 py-3 text-left">
                                    Featured
                                </th>

                                <th class="px-6 py-3 text-right">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @forelse ($experiences as $experience)

                                <tr>

                                    <td class="px-6 py-4 font-medium text-slate-800">

                                        {{ $experience->company }}

                                    </td>

                                    <td class="px-6 py-4 text-slate-700">

                                        {{ $experience->position }}

                                    </td>

                                    <td class="px-6 py-4 text-slate-600">

                                        {{ $experience->employment_type }}

                                    </td>

                                    <td class="px-6 py-4 text-slate-600">

                                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}

                                        -

                                        @if ($experience->currently_working)

                                            <span class="font-semibold text-green-600">

                                                Present

                                            </span>

                                        @else

                                            {{ optional($experience->end_date)
                                                ? \Carbon\Carbon::parse($experience->end_date)->format('M Y')
                                                : '-' }}

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        @if ($experience->featured)

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

                                            <a href="{{ route('experiences.show', $experience) }}"
                                                class="px-3 py-2 bg-slate-700 hover:bg-slate-800 text-white rounded-lg">

                                                View

                                            </a>

                                            <a href="{{ route('experiences.edit', $experience) }}"
                                                class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

                                                Edit

                                            </a>

                                            <form action="{{ route('experiences.destroy', $experience) }}" method="POST"
                                                onsubmit="return confirm('Delete this experience?')">

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

                                    <td colspan="6" class="px-6 py-10 text-center text-slate-500">

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