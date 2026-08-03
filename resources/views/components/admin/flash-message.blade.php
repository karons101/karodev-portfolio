{{-- ==========================================================
COMPONENT: FLASH MESSAGE

File:
resources/views/components/admin/flash-message.blade.php

Purpose:
Displays reusable success and error notifications
throughout the KaroDev Admin Dashboard.

Displays:
• Success messages
• Error messages
• Validation errors

Usage:
<x-admin.flash-message />

========================================================== --}}

@if (session('success'))

    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-6 py-4 text-green-800">

        <div class="flex items-center gap-3">

            <span class="text-xl">✅</span>

            <span class="font-medium">

                {{ session('success') }}

            </span>

        </div>

    </div>

@endif



@if (session('error'))

    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-6 py-4 text-red-800">

        <div class="flex items-center gap-3">

            <span class="text-xl">❌</span>

            <span class="font-medium">

                {{ session('error') }}

            </span>

        </div>

    </div>

@endif



@if ($errors->any())

    <div class="mb-6 rounded-lg border border-yellow-200 bg-yellow-50 px-6 py-4">

        <h3 class="font-semibold text-yellow-800 mb-3">

            Please fix the following:

        </h3>

        <ul class="list-disc list-inside space-y-1 text-yellow-700">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif