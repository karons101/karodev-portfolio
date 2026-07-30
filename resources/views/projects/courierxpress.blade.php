@extends('layouts.portfolio')

@section('title', 'CourierXpress')

@section('content')

{{-- ==========================================
     PROJECT HEADER
========================================== --}}

<section class="project-details">

    <div class="container">

        <span class="section-tag">
            Featured Project
        </span>

        <h1>CourierXpress</h1>

        <p class="section-description">
            A modern courier and logistics management platform developed with Laravel
            to streamline shipment tracking, dispatch operations, customer orders,
            delivery management and business workflow automation.
        </p>

        <img
            src="{{ asset('images/projects/courierxpress-dashboard.png') }}"
            alt="CourierXpress Dashboard"
            class="project-banner">

        <div class="project-buttons">

            <a href="https://business-landing-kit.vercel.app/"
               target="_blank"
               class="btn-primary">

                Live Demo

            </a>

            <a href="{{ route('projects.courierxpress') }}"
                     class="btn-secondary">

                     View Case Study

            </a>

            <a href="{{ route('projects') }}"
               class="btn-secondary">

                Back to Projects

            </a>

        </div>

    </div>

</section>

{{-- ==========================================
     PROJECT OVERVIEW
========================================== --}}

<section class="project-overview" id="overview">

    <div class="container">

        <h2>Project Overview</h2>

        <p>

            CourierXpress is a modern logistics and courier management platform
            engineered to simplify package handling, shipment tracking,
            dispatch operations and customer order management.
            Built with Laravel, the application follows scalable software
            architecture and modern development practices to provide an efficient,
            secure and maintainable business solution.

        </p>

        <div class="tech-stack">

            <span>Laravel</span>
            <span>PHP</span>
            <span>MySQL</span>
            <span>Blade</span>
            <span>JavaScript</span>
            <span>Git</span>

        </div>

    </div>

</section>

{{-- ==========================================
     KEY FEATURES
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>Key Features</h2>

        <ul class="feature-list">

            <li>✔ Customer Shipment Booking</li>

            <li>✔ Real-Time Shipment Tracking</li>

            <li>✔ Dispatch & Delivery Management</li>

            <li>✔ Secure User Authentication</li>

            <li>✔ Responsive Admin Dashboard</li>

            <li>✔ Modern Laravel MVC Architecture</li>

            <li>✔ Scalable Database Design</li>

        </ul>

    </div>

</section>

{{-- ==========================================
     PROJECT GALLERY
========================================== --}}

<section class="project-gallery">

    <div class="container">

        <h2>Project Gallery</h2>

        <div class="gallery-grid">

            <img
                src="{{ asset('images/projects/courierxpress-dashboard.png') }}"
                alt="CourierXpress Dashboard">

            <img
                src="{{ asset('images/projects/courierxpress-dashboard.png') }}"
                alt="Shipment Tracking">

            <img
                src="{{ asset('images/projects/courierxpress-dashboard.png') }}"
                alt="Responsive Mobile View">

        </div>

    </div>

</section>

{{-- ==========================================
     CHALLENGES & SOLUTIONS
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>Challenges & Solutions</h2>

        <p>

            One of the primary objectives was creating a logistics platform that
            balances powerful operational features with an intuitive user
            experience. Laravel's MVC architecture, modular development,
            responsive layouts and clean database design were adopted to
            deliver a secure, scalable and maintainable software solution
            suitable for future expansion.

        </p>

    </div>

</section>

{{-- ==========================================
     PROJECT OUTCOME
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>Project Outcome</h2>

        <p>

            CourierXpress demonstrates practical expertise in full-stack
            Laravel development, relational database design, business process
            automation and responsive interface development. The project serves
            as a solid foundation for a production-ready courier and logistics
            management platform capable of supporting real-world business
            operations.

        </p>

    </div>

</section>

{{-- ==========================================
     EXPLORE PROJECT
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>Explore the Project</h2>

        <div class="hero-buttons">

            <a href="https://business-landing-kit.vercel.app/"
               target="_blank"
               class="btn-primary">

                Visit Live Demo

            </a>

            <a href="#overview"
                 class="btn-secondary">

                      View Case Study

            </a>

            <a href="{{ route('projects') }}"
               class="btn-secondary">

                Back to Projects

            </a>

        </div>

    </div>

</section>

@endsection