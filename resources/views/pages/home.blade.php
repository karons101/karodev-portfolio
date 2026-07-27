@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container">

    {{-- ==========================================
         COMPONENT: HERO SECTION

         Purpose:
         Displays the main Hero section.
    ========================================== --}}

    @include('partials.hero')


    {{-- ==========================================
         COMPONENT: HERO STATISTICS

         Purpose:
         Displays animated portfolio statistics.
    ========================================== --}}

    @include('partials.statistics')

</div>

@endsection