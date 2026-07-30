{{-- ==========================================================
     COMPONENT: ADMIN CARD

     File:
     resources/views/components/admin/card.blade.php

     Purpose:
     This reusable Blade component provides the standard
     white content card used throughout the KaroDev Admin CMS.

     Why use this component?
     Instead of repeatedly writing:

         <div class="bg-white rounded-xl shadow-sm overflow-hidden">
             ...
         </div>

     throughout the project, we define it once here and
     reuse it everywhere.

     Usage:

         <x-admin.card>

             Your content here...

         </x-admin.card>

     Used In:
     - Dashboard
     - Projects
     - Blog
     - Skills
     - Experience
     - Certifications
     - Contact Messages
     - Settings

     Future Improvements:
     • Dark Mode
     • Custom Header Slots
     • Footer Slot
     • Loading State
     • Collapsible Card

========================================================== --}}

<div {{ $attributes->merge([
    'class' => 'bg-white rounded-xl shadow-sm overflow-hidden'
]) }}>

    {{ $slot }}

</div>