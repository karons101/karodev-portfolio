{{-- ==========================================================
COMPONENT: ADMIN CARD

File:
resources/views/components/admin/card.blade.php

Purpose:
Reusable white content card used throughout
the KaroDev Admin CMS.

Usage:

<x-admin.card>

    Content goes here...

</x-admin.card>

========================================================== --}}

<div {{ $attributes->merge([
    'class' => 'bg-white rounded-xl shadow-sm overflow-hidden'
]) }}>

    {{ $slot }}

</div>