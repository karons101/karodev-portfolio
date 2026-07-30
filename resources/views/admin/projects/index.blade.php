<x-app-layout>

    {{-- =========================================================
         PAGE HEADER
         ---------------------------------------------------------
         Displays the page title.
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Project Management

        </h2>

    </x-slot>



    {{-- =========================================================
         MAIN PAGE CONTENT
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ==========================================================
                 COMPONENT: ADMIN CARD

                 Purpose:
                 Reusable container used throughout the Admin CMS.

                 Benefits:
                 • Eliminates repeated HTML.
                 • Provides one central place for styling.
                 • Makes future design updates much easier.

                 Component File:
                 resources/views/components/admin/card.blade.php

            ========================================================== --}}

            <x-admin.card>

                {{-- =============================================
                     PAGE HEADER
                ============================================== --}}

                <div class="flex items-center justify-between p-6 border-b">

                    <div>

                        <h1 class="text-3xl font-bold text-slate-800">

                            Projects

                        </h1>

                        <p class="mt-2 text-slate-600">

                            Manage your portfolio projects.

                        </p>

                    </div>

                    {{-- =========================================
                         ADD PROJECT BUTTON
                    ========================================== --}}

                    <a href="{{ route('projects.create') }}"
                       class="px-5 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">

                        + Add New Project

                    </a>

                </div>



                {{-- =============================================
                     PROJECT TABLE
                ============================================== --}}

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-slate-100">

                            <tr>

                                <th class="px-6 py-4 text-left">

                                    Title

                                </th>

                                <th class="px-6 py-4 text-left">

                                    Technology

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Status

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Actions

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            {{-- =====================================
                                 TEMPORARY PLACEHOLDER
                            ====================================== --}}

                            <tr>

                                <td colspan="4"
                                    class="text-center py-12 text-slate-500">

                                    No projects found.

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </x-admin.card>

        </div>

    </div>

</x-app-layout>