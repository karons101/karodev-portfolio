@extends('layouts.app')

@section('title', 'Services')

@section('content')

{{-- ==========================================
     COMPONENT: SERVICES SECTION

     Purpose:
     Showcases the software development
     services offered by the developer.
========================================== --}}

<section class="services">

    <div class="container">

        <span class="section-tag">
            Services
        </span>

        <h2>How I Can Help Your Business</h2>

        <p class="section-description">
            I build modern software solutions that improve business operations,
            increase productivity and deliver exceptional user experiences.
        </p>

        <div class="services-grid">

            {{-- ==========================================
                 COMPONENT: WEB APPLICATIONS
            ========================================== --}}

            <article class="service-card">

                <h3>Web Application Development</h3>

                <p>
                    Custom web applications built with Laravel, PHP,
                    JavaScript and modern frontend technologies.
                </p>

            </article>

            {{-- ==========================================
                 COMPONENT: BUSINESS SOFTWARE
            ========================================== --}}

            <article class="service-card">

                <h3>Business Management Systems</h3>

                <p>
                    Software for logistics, healthcare, education,
                    hospitality and other business operations.
                </p>

            </article>

            {{-- ==========================================
                 COMPONENT: DATABASE DESIGN
            ========================================== --}}

            <article class="service-card">

                <h3>Database Design</h3>

                <p>
                    Secure, scalable and well-structured relational
                    database design using MySQL.
                </p>

            </article>

            {{-- ==========================================
                 COMPONENT: API DEVELOPMENT
            ========================================== --}}

            <article class="service-card">

                <h3>API Development</h3>

                <p>
                    RESTful APIs for integrating applications and
                    enabling seamless communication between systems.
                </p>

            </article>

            {{-- ==========================================
                 COMPONENT: WEBSITE REDESIGN
            ========================================== --}}

            <article class="service-card">

                <h3>Website Redesign</h3>

                <p>
                    Transform outdated websites into fast, responsive
                    and professional digital experiences.
                </p>

            </article>

            {{-- ==========================================
                 COMPONENT: MAINTENANCE
            ========================================== --}}

            <article class="service-card">

                <h3>Application Maintenance</h3>

                <p>
                    Ongoing maintenance, feature enhancements,
                    performance optimization and bug fixes.
                </p>

            </article>

        </div>

    </div>

</section>

@endsection