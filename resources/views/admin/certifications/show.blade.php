<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between gap-4">

            <div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Certification Details
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    View certification and credential information.
                </p>

            </div>

            <div class="mt-8 border-t border-slate-200 pt-6">

                <h3 class="text-lg font-semibold text-slate-800">
                    Certificate File
                </h3>

                @if ($certification->certificate_file)

                    <div class="mt-4">

                        <a href="{{ asset('storage/' . $certification->certificate_file) }}" target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                            Open Certificate ↗

                        </a>

                    </div>

                @else

                    <p class="mt-2 text-sm text-slate-500">
                        No certificate file uploaded.
                    </p>

                @endif

            </div>

            <a href="{{ route('certifications.index') }}" class="inline-flex items-center rounded-lg
                      bg-slate-600 px-5 py-2 text-sm
                      font-semibold text-white shadow-sm
                      hover:bg-slate-700 transition">

                ← Back to Certifications

            </a>

        </div>

    </x-slot>


    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <x-admin.flash-message />

            <x-admin.card>

                <div class="p-8">

                    <h3 class="text-2xl font-bold text-slate-800">
                        {{ $certification->name }}
                    </h3>

                    <p class="mt-2 text-slate-600">
                        {{ $certification->issuing_organization }}
                    </p>

                    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <div class="rounded-lg bg-slate-50 p-4">
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Issue Date
                            </p>

                            <p class="mt-1 text-sm font-medium text-slate-800">
                                {{ $certification->issue_date?->format('F j, Y') ?? 'Not provided' }}
                            </p>
                        </div>


                        <div class="rounded-lg bg-slate-50 p-4">
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Expiration Date
                            </p>

                            <p class="mt-1 text-sm font-medium text-slate-800">
                                {{ $certification->expiration_date?->format('F j, Y') ?? 'Does not expire' }}
                            </p>
                        </div>

                        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">

                            <div class="rounded-lg bg-slate-50 p-4">

                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                    Credential ID
                                </p>

                                <p class="mt-1 text-sm font-medium text-slate-800">
                                    {{ $certification->credential_id ?: 'Not provided' }}
                                </p>

                            </div>


                            <div class="rounded-lg bg-slate-50 p-4">

                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                    Verification URL
                                </p>

                                @if ($certification->credential_url)

                                    <a href="{{ $certification->credential_url }}" target="_blank" rel="noopener noreferrer"
                                        class="mt-1 inline-block text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline">

                                        Verify Credential ↗

                                    </a>

                                @else

                                    <p class="mt-1 text-sm font-medium text-slate-800">
                                        Not provided
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>