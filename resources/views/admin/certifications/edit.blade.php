<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between gap-4">

            <div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Edit Certification
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Update this certification or credential in your KaroDev portfolio.
                </p>

            </div>

            <a href="{{ route('certifications.show', $certification) }}" class="inline-flex
                      items-center
                      rounded-lg
                      bg-slate-600
                      px-5 py-2
                      text-sm
                      font-semibold
                      text-white
                      shadow-sm
                      hover:bg-slate-700
                      hover:-translate-y-0.5
                      transition
                      duration-200">

                ← Back to Certification

            </a>

        </div>

    </x-slot>


    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <x-admin.flash-message />

            <x-admin.card>

                <form action="{{ route('certifications.update', $certification) }}" method="POST"
                    enctype="multipart/form-data" class="p-8 space-y-10">

                    @csrf

                    @method('PUT')

                    {{-- ==========================================================
                    BASIC CERTIFICATION INFORMATION
                    =========================================================== --}}

                    <div>

                        <div class="mb-5">

                            <h3 class="text-lg font-semibold text-slate-800">
                                Basic Information
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Update the certification name and issuing organization.
                            </p>

                        </div>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                            {{-- CERTIFICATION NAME --}}

                            <div>

                                <label for="name" class="block mb-2 font-medium text-slate-700">

                                    Certification Name

                                </label>

                                <input id="name" type="text" name="name" value="{{ old('name', $certification->name) }}"
                                    class="w-full rounded-lg border-gray-300
                       focus:border-blue-500
                       focus:ring-blue-500">

                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- ISSUING ORGANIZATION --}}

                            <div>

                                <label for="issuing_organization" class="block mb-2 font-medium text-slate-700">

                                    Issuing Organization

                                </label>

                                <input id="issuing_organization" type="text" name="issuing_organization"
                                    value="{{ old('issuing_organization', $certification->issuing_organization) }}"
                                    class="w-full rounded-lg border-gray-300
                       focus:border-blue-500
                       focus:ring-blue-500">

                                @error('issuing_organization')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>

                    </div>

                    {{-- ==========================================================
                    CERTIFICATION DATES
                    =========================================================== --}}

                    <div>

                        <div class="mb-5">

                            <h3 class="text-lg font-semibold text-slate-800">
                                Certification Dates
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Update when the certification was issued and, if applicable, when it expires.
                            </p>

                        </div>


                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                            {{-- ISSUE DATE --}}

                            <div>

                                <label for="issue_date" class="block mb-2 font-medium text-slate-700">

                                    Issue Date

                                </label>


                                <input id="issue_date" type="date" name="issue_date"
                                    value="{{ old('issue_date', optional($certification->issue_date)->format('Y-m-d')) }}"
                                    class="w-full rounded-lg border-gray-300
                       focus:border-blue-500
                       focus:ring-blue-500">


                                <p class="mt-2 text-xs text-slate-500">

                                    The date the certification was awarded.

                                </p>


                                @error('issue_date')

                                    <p class="mt-1 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>


                            {{-- EXPIRATION DATE --}}

                            <div>

                                <label for="expiration_date" class="block mb-2 font-medium text-slate-700">

                                    Expiration Date

                                </label>


                                <input id="expiration_date" type="date" name="expiration_date"
                                    value="{{ old('expiration_date', optional($certification->expiration_date)->format('Y-m-d')) }}"
                                    class="w-full rounded-lg border-gray-300
                       focus:border-blue-500
                       focus:ring-blue-500">


                                <p class="mt-2 text-xs text-slate-500">

                                    Leave blank if the certification does not expire.

                                </p>


                                @error('expiration_date')

                                    <p class="mt-1 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>

                    {{-- ==========================================================
                    CREDENTIAL INFORMATION
                    =========================================================== --}}

                    <div>

                        <div class="mb-5">

                            <h3 class="text-lg font-semibold text-slate-800">
                                Credential Information
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Update the credential ID and public verification link if available.
                            </p>

                        </div>


                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                            {{-- CREDENTIAL ID --}}

                            <div>

                                <label for="credential_id" class="block mb-2 font-medium text-slate-700">

                                    Credential ID

                                </label>


                                <input id="credential_id" type="text" name="credential_id"
                                    value="{{ old('credential_id', $certification->credential_id) }}" class="w-full rounded-lg border-gray-300
                       focus:border-blue-500
                       focus:ring-blue-500">


                                @error('credential_id')

                                    <p class="mt-1 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>


                            {{-- VERIFICATION URL --}}

                            <div>

                                <label for="credential_url" class="block mb-2 font-medium text-slate-700">

                                    Verification URL

                                </label>


                                <input id="credential_url" type="url" name="credential_url"
                                    value="{{ old('credential_url', $certification->credential_url) }}" class="w-full rounded-lg border-gray-300
                       focus:border-blue-500
                       focus:ring-blue-500">


                                @error('credential_url')

                                    <p class="mt-1 text-sm text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- ==========================================================
                    CERTIFICATE FILE
                    =========================================================== --}}

                    <div>

                        <div class="mb-5">

                            <h3 class="text-lg font-semibold text-slate-800">
                                Certificate File
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Replace the existing certificate file or upload a new one.
                            </p>

                        </div>


                        {{-- CURRENT CERTIFICATE FILE --}}

                        @if ($certification->certificate_file)

                            <div class="mb-5 rounded-xl border border-slate-200 bg-slate-50 p-5">

                                <p class="text-sm font-medium text-slate-700">
                                    Current Certificate File
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ basename($certification->certificate_file) }}
                                </p>

                                <a href="{{ asset('storage/' . $certification->certificate_file) }}" target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-3 inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800">
                                    View Current Certificate
                                </a>

                            </div>

                        @endif


                        {{-- NEW CERTIFICATE FILE --}}

                        <div>

                            <label for="certificate_file" class="block mb-2 font-medium text-slate-700">

                                Replace Certificate File

                            </label>


                            <input id="certificate_file" type="file" name="certificate_file"
                                accept=".pdf,.jpg,.jpeg,.png,.webp" class="block w-full rounded-lg border border-gray-300
                   bg-white text-sm text-slate-700
                   file:mr-4
                   file:border-0
                   file:bg-slate-100
                   file:px-4
                   file:py-2.5
                   file:font-semibold
                   file:text-slate-700
                   hover:file:bg-slate-200">


                            <p class="mt-2 text-xs text-slate-500">
                                Leave blank to keep the current file.
                                PDF, JPG, JPEG, PNG, or WebP files are supported.
                                Maximum size: 5 MB.
                            </p>


                            @error('certificate_file')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>


{{-- ==========================================================
PORTFOLIO DISPLAY SETTINGS
=========================================================== --}}

<div>

    <div class="mb-5">

        <h3 class="text-lg font-semibold text-slate-800">
            Portfolio Display
        </h3>

        <p class="mt-1 text-sm text-slate-500">
            Control how this certification is prioritized and ordered
            in the KaroDev portfolio.
        </p>

    </div>


    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


        {{-- FEATURED CERTIFICATION --}}

        <div class="rounded-xl
                    border
                    border-slate-200
                    bg-slate-50
                    p-5">

            <div class="flex items-start gap-4">

                <input
                    id="featured"
                    type="checkbox"
                    name="featured"
                    value="1"
                    {{ old('featured', $certification->featured) ? 'checked' : '' }}
                    class="mt-1
                           rounded
                           border-gray-300
                           text-blue-600
                           shadow-sm
                           focus:ring-blue-500"
                >


                <div>

                    <label
                        for="featured"
                        class="font-semibold text-slate-800"
                    >
                        Feature this certification
                    </label>


                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Highlight this certification on the
                        public portfolio.
                    </p>

                </div>

            </div>

        </div>


        {{-- SORT ORDER --}}

        <div>

            <label
                for="sort_order"
                class="block mb-2 font-medium text-slate-700"
            >
                Display Order
            </label>


            <input
                id="sort_order"
                type="number"
                name="sort_order"
                min="0"
                value="{{ old('sort_order', $certification->sort_order) }}"
                class="w-full
                       rounded-lg
                       border-gray-300
                       focus:border-blue-500
                       focus:ring-blue-500"
            >


            <p class="mt-2 text-xs text-slate-500">
                Lower numbers appear first.
            </p>


            @error('sort_order')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>

</div>


{{-- ==========================================================
FORM ACTIONS
=========================================================== --}}

<div class="flex items-center justify-between border-t border-slate-200 pt-8">

    <a
        href="{{ route('certifications.show', $certification) }}"
        class="inline-flex
               items-center
               rounded-lg
               border
               border-slate-300
               bg-white
               px-5
               py-2.5
               text-sm
               font-semibold
               text-slate-700
               shadow-sm
               hover:bg-slate-50
               transition
               duration-200"
    >
        Cancel
    </a>


    <button
        type="submit"
        class="inline-flex
               items-center
               rounded-lg
               bg-blue-600
               px-6
               py-2.5
               text-sm
               font-semibold
               text-white
               shadow-sm
               hover:bg-blue-700
               hover:-translate-y-0.5
               transition
               duration-200"
    >
        Update Certification
    </button>

</div>

                </form>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>