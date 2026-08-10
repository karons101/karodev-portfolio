{{-- ==========================================================
PAGE: CREATE CERTIFICATION
----------------------------------------------------------
Purpose:
Provides the KaroDev administrator with a professional
form for creating a new certification.

DATABASE FIELDS
----------------------------------------------------------
This form now follows the ACTUAL certifications table:

• name
• issuing_organization
• issue_date
• expiration_date
• credential_id
• credential_url
• certificate_file
• featured
• sort_order

IMPORTANT
----------------------------------------------------------
These names must remain synchronized with:

Certification model
CertificationController
certifications database table

========================================================== --}}


<x-app-layout>


    {{-- ==========================================================
    PAGE HEADER
    ----------------------------------------------------------
    Displays the page title and provides navigation back
    to the Certifications management page.
    =========================================================== --}}

    <x-slot name="header">

        <div class="flex items-center justify-between gap-4">


            {{-- ==================================================
            PAGE TITLE
            =================================================== --}}

            <div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                    Add Certification

                </h2>


                <p class="mt-1 text-sm text-slate-500">

                    Add a professional certification or credential
                    to your KaroDev portfolio.

                </p>

            </div>



            {{-- ==================================================
            BACK TO CERTIFICATIONS
            =================================================== --}}

            <a href="{{ route('certifications.index') }}" class="inline-flex
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

                ← Back to Certifications

            </a>

        </div>

    </x-slot>



    {{-- ==========================================================
    MAIN PAGE CONTENT
    =========================================================== --}}

    <div class="py-12">


        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">


            {{-- ==================================================
            FLASH MESSAGES
            =================================================== --}}

            <x-admin.flash-message />



            {{-- ==================================================
            CERTIFICATION FORM CARD
            =================================================== --}}

            <x-admin.card>


                <form action="{{ route('certifications.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-8 space-y-10">

                    @csrf



                    {{-- ==================================================
                    FORM INTRODUCTION
                    =================================================== --}}

                    <div class="rounded-xl
                               border
                               border-blue-100
                               bg-blue-50
                               p-5">

                        <h3 class="font-semibold
                                   text-blue-900">

                            Certification Information

                        </h3>


                        <p class="mt-1
                                   text-sm
                                   leading-6
                                   text-blue-700">

                            Enter the official information exactly as
                            it appears on your certificate or credential.

                        </p>

                    </div>



                    {{-- ==================================================
                    BASIC CERTIFICATION INFORMATION
                    --------------------------------------------------
                    Contains the certification name and the
                    organization that issued it.
                    =================================================== --}}

                    <div>

                        <div class="mb-5">

                            <h3 class="text-lg
                                       font-semibold
                                       text-slate-800">

                                Basic Information

                            </h3>


                            <p class="mt-1
                                       text-sm
                                       text-slate-500">

                                Identify the certification and its
                                issuing organization.

                            </p>

                        </div>



                        <div class="grid
                                   grid-cols-1
                                   gap-6
                                   md:grid-cols-2">


                            {{-- ==================================================
                            CERTIFICATION NAME
                            =================================================== --}}

                            <div>

                                <label for="name" class="block
                                           mb-2
                                           font-medium
                                           text-slate-700">

                                    Certification Name

                                </label>


                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="e.g. Programming Foundations: Fundamentals" class="w-full
                                           rounded-lg
                                           border-gray-300
                                           focus:border-blue-500
                                           focus:ring-blue-500">


                                @error('name')

                                    <p class="mt-1
                                                       text-sm
                                                       text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>



                            {{-- ==================================================
                            ISSUING ORGANIZATION
                            =================================================== --}}

                            <div>

                                <label for="issuing_organization" class="block
                                           mb-2
                                           font-medium
                                           text-slate-700">

                                    Issuing Organization

                                </label>


                                <input id="issuing_organization" type="text" name="issuing_organization"
                                    value="{{ old('issuing_organization') }}" placeholder="e.g. LinkedIn Learning"
                                    class="w-full
                                           rounded-lg
                                           border-gray-300
                                           focus:border-blue-500
                                           focus:ring-blue-500">


                                @error('issuing_organization')

                                    <p class="mt-1
                                                       text-sm
                                                       text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>



                    {{-- ==================================================
                    PART 1 END
                    --------------------------------------------------
                    Part 2 will add:

                    • Issue date
                    • Expiration date
                    • Non-expiring option

                    =================================================== --}}

                    {{-- ==========================================================
                    CERTIFICATION DATES
                    ----------------------------------------------------------
                    Allows the administrator to record:

                    • Date the certification was issued
                    • Optional expiration date

                    Many professional certifications do not expire,
                    so expiration_date remains optional.
                    =========================================================== --}}

                    <div>

                        <div class="mb-5">

                            <h3 class="text-lg
                                       font-semibold
                                       text-slate-800">

                                Certification Dates

                            </h3>


                            <p class="mt-1
                                       text-sm
                                       text-slate-500">

                                Record when the certification was issued
                                and, if applicable, when it expires.

                            </p>

                        </div>



                        <div class="grid
                                   grid-cols-1
                                   gap-6
                                   md:grid-cols-2">


                            {{-- ==================================================
                            ISSUE DATE
                            =================================================== --}}

                            <div>

                                <label for="issue_date" class="block
                                           mb-2
                                           font-medium
                                           text-slate-700">

                                    Issue Date

                                </label>


                                <input id="issue_date" type="date" name="issue_date" value="{{ old('issue_date') }}"
                                    class="w-full
                                           rounded-lg
                                           border-gray-300
                                           focus:border-blue-500
                                           focus:ring-blue-500">


                                <p class="mt-2
                                           text-xs
                                           text-slate-500">

                                    The date the certification was awarded.

                                </p>


                                @error('issue_date')

                                    <p class="mt-1
                                                       text-sm
                                                       text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>



                            {{-- ==================================================
                            EXPIRATION DATE
                            =================================================== --}}

                            <div>

                                <label for="expiration_date" class="block
                                           mb-2
                                           font-medium
                                           text-slate-700">

                                    Expiration Date

                                </label>


                                <input id="expiration_date" type="date" name="expiration_date"
                                    value="{{ old('expiration_date') }}" class="w-full
                                           rounded-lg
                                           border-gray-300
                                           focus:border-blue-500
                                           focus:ring-blue-500">


                                <p class="mt-2
                                           text-xs
                                           text-slate-500">

                                    Leave blank if the certification
                                    does not expire.

                                </p>


                                @error('expiration_date')

                                    <p class="mt-1
                                                       text-sm
                                                       text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>



                    {{-- ==========================================================
                    CREDENTIAL INFORMATION
                    ----------------------------------------------------------
                    Stores optional identification and verification
                    information associated with the certification.

                    Examples:

                    Credential ID:
                    ABC-123456

                    Verification URL:
                    https://example.com/verify/ABC-123456
                    =========================================================== --}}

                    <div>

                        <div class="mb-5">

                            <h3 class="text-lg
                                       font-semibold
                                       text-slate-800">

                                Credential Information

                            </h3>


                            <p class="mt-1
                                       text-sm
                                       text-slate-500">

                                Add verification details when they are
                                available.

                            </p>

                        </div>



                        <div class="space-y-6">


                            {{-- ==================================================
                            CREDENTIAL ID
                            =================================================== --}}

                            <div>

                                <label for="credential_id" class="block
                                           mb-2
                                           font-medium
                                           text-slate-700">

                                    Credential ID

                                </label>


                                <input id="credential_id" type="text" name="credential_id"
                                    value="{{ old('credential_id') }}" placeholder="e.g. ABC123456789" class="w-full
                                           rounded-lg
                                           border-gray-300
                                           focus:border-blue-500
                                           focus:ring-blue-500">


                                <p class="mt-2
                                           text-xs
                                           text-slate-500">

                                    Optional identification number assigned
                                    to this certification.

                                </p>


                                @error('credential_id')

                                    <p class="mt-1
                                                       text-sm
                                                       text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>



                            {{-- ==================================================
                            CREDENTIAL / VERIFICATION URL
                            =================================================== --}}

                            <div>

                                <label for="credential_url" class="block
                                           mb-2
                                           font-medium
                                           text-slate-700">

                                    Verification URL

                                </label>


                                <input id="credential_url" type="url" name="credential_url"
                                    value="{{ old('credential_url') }}"
                                    placeholder="https://www.example.com/verify/certificate" class="w-full
                                           rounded-lg
                                           border-gray-300
                                           focus:border-blue-500
                                           focus:ring-blue-500">


                                <p class="mt-2
                                           text-xs
                                           text-slate-500">

                                    Optional public URL where visitors can
                                    verify the certification.

                                </p>


                                @error('credential_url')

                                    <p class="mt-1
                                                       text-sm
                                                       text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>

                    {{-- ==========================================================
                    CERTIFICATE FILE
                    ----------------------------------------------------------
                    Allows an administrator to attach the original
                    certificate document or an image of the certificate.

                    The database uses a "certificate_file" column,
                    which supports uploaded certificate documents and images.

                    Upload the original certificate document or an image
                    of the certificate.

                    PDF, JPG, JPEG, PNG, and WebP files are supported.

                    IMPORTANT:
                    The upload and storage logic is handled by
                    CertificationController.
                    =========================================================== --}}

                    <div>

                        <div class="mb-5">

                            <h3 class="text-lg
                   font-semibold
                   text-slate-800">

                                Certificate File

                            </h3>


                            <p class="mt-1
                   text-sm
                   text-slate-500">

                                Optionally upload the certificate document
                                or an image of the certificate.

                            </p>

                        </div>


                        <div>

                            <label for="certificate_file" class="block
                   mb-2
                   font-medium
                   text-slate-700">

                                Certificate File

                            </label>


                            <input id="certificate_file" type="file" name="certificate_file"
                                accept=".pdf,.jpg,.jpeg,.png,.webp" class="block
                      w-full
                      rounded-lg
                      border
                      border-gray-300
                      bg-white
                      text-sm
                      text-slate-700
                      file:mr-4
                      file:border-0
                      file:bg-slate-100
                      file:px-4
                      file:py-2.5
                      file:font-semibold
                      file:text-slate-700
                      hover:file:bg-slate-200">


                            <p class="mt-2
                   text-xs
                   text-slate-500">

                                PDF, JPG, JPEG, PNG, or WebP files are supported.
                                Maximum file size: 5 MB.

                            </p>


                            @error('certificate_file')

                                        <p class="mt-1
                                   text-sm
                                   text-red-600">

                                            {{ $message }}

                                        </p>

                            @enderror

                        </div>

                    </div>



                    {{-- ==========================================================
                    PORTFOLIO DISPLAY SETTINGS
                    ----------------------------------------------------------
                    Controls how the certification will be presented
                    within the KaroDev portfolio.

                    featured:
                    Highlights an important certification.

                    sort_order:
                    Controls the display order of certifications.
                    =========================================================== --}}

                    <div>

                        <div class="mb-5">

                            <h3 class="text-lg
                                       font-semibold
                                       text-slate-800">

                                Portfolio Display

                            </h3>


                            <p class="mt-1
                                       text-sm
                                       text-slate-500">

                                Control how this certification should be
                                prioritized and ordered.

                            </p>

                        </div>


                        <div class="grid
                                   grid-cols-1
                                   gap-6
                                   md:grid-cols-2">


                            {{-- ==================================================
                            FEATURED CERTIFICATION
                            =================================================== --}}

                            <div class="rounded-xl
                                       border
                                       border-slate-200
                                       bg-slate-50
                                       p-5">

                                <div class="flex items-start gap-4">


                                    {{-- Checkbox --}}

                                    <input id="featured" type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="mt-1
                                               rounded
                                               border-gray-300
                                               text-blue-600
                                               shadow-sm
                                               focus:ring-blue-500">


                                    <div>

                                        <label for="featured" class="font-semibold
                                                   text-slate-800">

                                            Feature this certification

                                        </label>


                                        <p class="mt-1
                                                   text-sm
                                                   leading-6
                                                   text-slate-500">

                                            Highlight this credential on the
                                            public portfolio.

                                        </p>

                                    </div>

                                </div>

                            </div>



                            {{-- ==================================================
                            SORT ORDER
                            =================================================== --}}

                            <div>

                                <label for="sort_order" class="block
                                           mb-2
                                           font-medium
                                           text-slate-700">

                                    Display Order

                                </label>


                                <input id="sort_order" type="number" name="sort_order" min="0"
                                    value="{{ old('sort_order', 0) }}" class="w-full
                                           rounded-lg
                                           border-gray-300
                                           focus:border-blue-500
                                           focus:ring-blue-500">


                                <p class="mt-2
                                           text-xs
                                           text-slate-500">

                                    Lower numbers appear first.

                                </p>


                                @error('sort_order')

                                    <p class="mt-1
                                                       text-sm
                                                       text-red-600">

                                        {{ $message }}

                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>



                    {{-- ==========================================================
                    FORM ACTIONS
                    ----------------------------------------------------------
                    Final controls for the administrator.

                    Cancel:
                    Returns to the certification index.

                    Create Certification:
                    Submits the form to CertificationController.
                    =========================================================== --}}

                    <div class="flex
                               flex-col
                               gap-3
                               border-t
                               border-slate-200
                               pt-6
                               sm:flex-row
                               sm:items-center
                               sm:justify-end">


                        {{-- ==================================================
                        CANCEL
                        =================================================== --}}

                        <a href="{{ route('certifications.index') }}" class="inline-flex
                                   items-center
                                   justify-center
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
                                   hover:-translate-y-0.5
                                   transition
                                   duration-200">

                            Cancel

                        </a>



                        {{-- ==================================================
                        CREATE CERTIFICATION
                        =================================================== --}}

                        <button type="submit" class="inline-flex
                                   items-center
                                   justify-center
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
                                   duration-200">

                            Create Certification

                        </button>

                    </div>


                </form>


            </x-admin.card>


        </div>

    </div>


</x-app-layout>


{{-- ==========================================================
END OF CREATE CERTIFICATION PAGE
========================================================== --}}