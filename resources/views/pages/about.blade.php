@extends('layouts.app')

@section('title', 'About Me')

@section('content')

{{-- ==========================================
     COMPONENT: ABOUT SECTION

     Purpose:
     Introduces the developer, highlights
     experience, philosophy and career goals.
========================================== --}}

<section class="about">

    <div class="container">

        <div class="about-grid">

            {{-- ==========================================
                 COMPONENT: ABOUT IMAGE
            ========================================== --}}

            <div class="about-image">

                <img
                    src="{{ asset('images/avatars/oghenekaro-anakpoha.png') }}"
                    alt="Oghenekaro Cletus Anakpoha">

            </div>

            {{-- ==========================================
                 COMPONENT: ABOUT CONTENT
            ========================================== --}}

            <div class="about-content">

                <span class="section-tag">
                    About Me
                </span>

                <h2>
                    Building Software That Solves Real Business Problems
                </h2>

                <p>
                    I'm Oghenekaro Cletus Anakpoha, a Full-Stack Software
                    Developer passionate about designing scalable,
                    secure and maintainable web applications.
                </p>

                <p>
                    My expertise includes Laravel, PHP,
                    JavaScript, MySQL and modern web
                    development practices.
                </p>

                <p>
                    I enjoy transforming business ideas into
                    reliable software products with clean
                    architecture and excellent user experience.
                </p>

                <a href="{{ route('contact') }}"
                   class="btn-primary">
                    Let's Work Together
                </a>

            </div>

        </div>

    </div>

</section>

@endsection