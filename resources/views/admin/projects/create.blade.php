<x-app-layout>

    {{-- =========================================================
         PAGE HEADER
         ---------------------------------------------------------
         Displays the page title.
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Add New Project

        </h2>

    </x-slot>


    {{-- =========================================================
         MAIN PAGE CONTENT
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-xl overflow-hidden">


                {{-- =============================================
                     PAGE HEADER
                ============================================== --}}

                <div class="border-b p-6">

                    <h1 class="text-3xl font-bold text-slate-800">

                        Create Project

                    </h1>

                    <p class="mt-2 text-slate-600">

                        Add a new portfolio project.

                    </p>

                </div>


                {{-- =============================================
                     PROJECT FORM
                ============================================== --}}

                <form action="#"
                      method="POST"
                      enctype="multipart/form-data"
                      class="p-8 space-y-8">

                    @csrf


                    {{-- Project Title --}}

                    <div>

                        <label class="block mb-2 font-semibold">

                            Project Title

                        </label>

                        <input
                            type="text"
                            class="w-full border rounded-lg p-3">

                    </div>


                    {{-- Slug --}}

                    <div>

                        <label class="block mb-2 font-semibold">

                            Slug

                        </label>

                        <input
                            type="text"
                            class="w-full border rounded-lg p-3">

                    </div>


                    {{-- Technology Stack --}}

                    <div>

                        <label class="block mb-2 font-semibold">

                            Technology Stack

                        </label>

                        <input
                            type="text"
                            class="w-full border rounded-lg p-3">

                    </div>


                    {{-- Category --}}

                    <div>

                        <label class="block mb-2 font-semibold">

                            Category

                        </label>

                        <input
                            type="text"
                            class="w-full border rounded-lg p-3">

                    </div>


                    {{-- GitHub URL --}}

                    <div>

                        <label class="block mb-2 font-semibold">

                            GitHub URL

                        </label>

                        <input
                            type="url"
                            class="w-full border rounded-lg p-3">

                    </div>


                    {{-- Live Demo URL --}}

                    <div>

                        <label class="block mb-2 font-semibold">

                            Live Demo URL

                        </label>

                        <input
                            type="url"
                            class="w-full border rounded-lg p-3">

                    </div>


                    {{-- Short Description --}}

                    <div>

                        <label class="block mb-2 font-semibold">

                            Short Description

                        </label>

                        <textarea
                            rows="3"
                            class="w-full border rounded-lg p-3"></textarea>

                    </div>


                    {{-- Full Description --}}

                    <div>

                        <label class="block mb-2 font-semibold">

                            Full Description

                        </label>

                        <textarea
                            rows="8"
                            class="w-full border rounded-lg p-3"></textarea>

                    </div>


                    {{-- Project Image --}}

                    <div>

                        <label class="block mb-2 font-semibold">

                            Project Image

                        </label>

                        <input
                            type="file"
                            class="w-full">

                    </div>


                    {{-- Featured Project --}}

                    <div>

                        <label class="inline-flex items-center gap-3">

                            <input type="checkbox">

                            <span>

                                Feature this project on the homepage

                            </span>

                        </label>

                    </div>


                    {{-- Submit Button --}}

                    <div>

                        <button
                            type="submit"
                            class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">

                            Save Project

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>