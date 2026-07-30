<x-app-layout>

    {{-- =========================================================
         PAGE HEADER
         ---------------------------------------------------------
         Displays the page title inside the Breeze layout.
    ========================================================== --}}

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ __('Dashboard') }}

        </h2>

    </x-slot>


    {{-- =========================================================
         MAIN PAGE CONTENT
    ========================================================== --}}

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                {{-- =================================================
                     DASHBOARD WELCOME SECTION
                     -------------------------------------------------
                     Displays a welcome message to the logged-in user.
                ================================================== --}}

                <div class="p-6">

                    <h1 class="text-3xl font-bold text-slate-800">

                        Welcome back, {{ Auth::user()->name }}!

                    </h1>

                    <p class="mt-2 mb-8 text-slate-600">

                        Welcome to the KaroDev Admin Dashboard.

                    </p>


                    {{-- =============================================
                         DASHBOARD STATISTICS CARDS
                         ------------------------------------------------
                         These cards will later display real totals
                         from the database.
                    ============================================== --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">


                        {{-- Projects Card --}}

                        <div class="bg-blue-600 text-white rounded-xl shadow-lg p-6">

                            <h3 class="text-sm uppercase tracking-wider">

                                Projects

                            </h3>

                            <p class="text-4xl font-bold mt-3">

                                0

                            </p>

                        </div>


                        {{-- Skills Card --}}

                        <div class="bg-emerald-600 text-white rounded-xl shadow-lg p-6">

                            <h3 class="text-sm uppercase tracking-wider">

                                Skills

                            </h3>

                            <p class="text-4xl font-bold mt-3">

                                0

                            </p>

                        </div>


                        {{-- Blog Card --}}

                        <div class="bg-amber-500 text-white rounded-xl shadow-lg p-6">

                            <h3 class="text-sm uppercase tracking-wider">

                                Blog Posts

                            </h3>

                            <p class="text-4xl font-bold mt-3">

                                0

                            </p>

                        </div>


                        {{-- Messages Card --}}

                        <div class="bg-rose-600 text-white rounded-xl shadow-lg p-6">

                            <h3 class="text-sm uppercase tracking-wider">

                                Messages

                            </h3>

                            <p class="text-4xl font-bold mt-3">

                                0

                            </p>

                        </div>

                    </div>


                    {{-- =============================================
                         QUICK ACTIONS SECTION
                         ------------------------------------------------
                         Provides shortcuts to major CMS modules.
                    ============================================== --}}

                    <div class="mt-10">

                        <h2 class="text-2xl font-bold text-slate-800 mb-6">

                            Quick Actions

                        </h2>


                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">


                            {{-- Manage Projects --}}

                            <a href="{{ route('projects.index') }}"
                               class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                                <h3 class="text-lg font-semibold text-slate-800">

                                    📦 Projects

                                </h3>

                                <p class="mt-2 text-slate-600">

                                    Manage all portfolio projects.

                                </p>

                            </a>


                            {{-- Blog Manager --}}

                            <a href="#"
                               class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                                <h3 class="text-lg font-semibold text-slate-800">

                                    ✍ Blog

                                </h3>

                                <p class="mt-2 text-slate-600">

                                    Create and edit blog posts.

                                </p>

                            </a>


                            {{-- Skills Manager --}}

                            <a href="#"
                               class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                                <h3 class="text-lg font-semibold text-slate-800">

                                    🛠 Skills

                                </h3>

                                <p class="mt-2 text-slate-600">

                                    Update your technical skills.

                                </p>

                            </a>


                            {{-- Messages Manager --}}

                            <a href="#"
                               class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                                <h3 class="text-lg font-semibold text-slate-800">

                                    📩 Messages

                                </h3>

                                <p class="mt-2 text-slate-600">

                                    Read contact messages.

                                </p>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
