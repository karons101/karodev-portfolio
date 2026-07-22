@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container">

{{-- ==========================================
     HERO SECTION
========================================== --}}

{{-- ==========================================
     HERO SECTION

     Purpose:
     Loads the reusable Hero section from
     the partials directory.
========================================== --}}

@include('partials.hero')


    {{-- ==========================================
     HERO STATISTICS
    ========================================== --}}

   {{-- ==========================================
     HERO STATISTICS

     Purpose:
     Loads the reusable statistics section from
     the partials directory.
========================================== --}}

@include('partials.statistics')
 </div>

@endsection