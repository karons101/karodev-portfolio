@extends('layouts.app')

@section('title', 'NovaCare Medical Centre')

@section('content')

<section class="project-details">

    <div class="container">

        <span class="section-tag">
            Completed Project
        </span>

        <h1>NovaCare Medical Centre</h1>

        <p class="section-description">
            NovaCare Medical Centre is a modern healthcare website designed to
            improve the online presence of a medical facility by providing
            patients with easy access to healthcare services, doctor information,
            appointment booking and essential medical resources through a clean,
            responsive and professional interface.
        </p>

        <img
            src="{{ asset('images/projects/novacare-medical-centre.png') }}"
            alt="NovaCare Medical Centre"
            class="project-banner">

        <div class="project-buttons">

            <a href="https://clinichospital.netlify.app/"
               target="_blank"
               class="btn-primary">
                Live Demo
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

<section class="project-overview">

    <div class="container">

        <h2>Project Overview</h2>

        <p>
            NovaCare Medical Centre was developed to provide a professional,
            modern and responsive digital presence for a healthcare provider.
            The objective was to improve accessibility to healthcare services,
            present medical information clearly and establish trust with
            patients through an intuitive user experience.
        </p>

        <div class="tech-stack">

            <span>HTML5</span>
            <span>CSS3</span>
            <span>JavaScript</span>
            <span>Responsive Design</span>
            <span>UI / UX Design</span>

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

            <li>✔ Modern responsive healthcare website</li>
            <li>✔ Professional landing page</li>
            <li>✔ Medical services presentation</li>
            <li>✔ Doctor and clinic information</li>
            <li>✔ Appointment call-to-action</li>
            <li>✔ Mobile-first responsive design</li>
            <li>✔ Fast loading performance</li>

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
                src="{{ asset('images/projects/novacare-medical-centre.png') }}"
                alt="NovaCare Homepage">

            <img
                src="{{ asset('images/projects/novacare-medical-centre.png') }}"
                alt="NovaCare Services">

            <img
                src="{{ asset('images/projects/novacare-medical-centre.png') }}"
                alt="NovaCare Mobile View">

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
            The primary challenge was creating a clean, trustworthy healthcare
            website that remains easy to navigate across desktops, tablets and
            mobile devices. A responsive layout, clear visual hierarchy and
            modern UI components were implemented to deliver an excellent user
            experience.
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
            The final product is a fast, modern and fully responsive healthcare
            website that demonstrates strong frontend development skills,
            responsive design principles and professional user interface design.
        </p>

    </div>

</section>


<section class="project-overview">

    <div class="container">

        <h2>Explore the Project</h2>

        <div class="hero-buttons">

            <a href="https://clinichospital.netlify.app/"
               target="_blank"
               class="btn-primary">
                Visit Live Website
            </a>

            <a href="{{ route('projects') }}"
               class="btn-secondary">
                Back to Projects
            </a>

        </div>

    </div>

</section>

@endsection