@extends('layouts.app')

@section('title', 'Projects')

@section('content')

{{-- ==========================================
     COMPONENT: PROJECTS SECTION

     Purpose:
     Showcases enterprise-grade software
     solutions demonstrating full-stack
     development, software engineering
     and business problem-solving skills.
========================================== --}}

<section class="projects">

    <div class="container">

        <span class="section-tag">
            My Portfolio
        </span>

        <h2>Featured Software Solutions</h2>

        <p class="section-description">
            A growing portfolio of modern software applications designed to
            solve real-world business challenges through scalable architecture,
            intuitive user experiences and robust engineering practices.
        </p>

        <div class="projects-grid">

            {{-- ==========================================
                 FEATURED PROJECT
                 NovaCare Medical Centre
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/novacare-medical-centre.png') }}"
                    alt="NovaCare Medical Centre">

                <div class="project-content">

                    <span class="project-status completed">
                        ⭐ Featured Project
                    </span>

                    <h3>NovaCare Medical Centre</h3>

                    <p>
                        A modern healthcare website developed to strengthen the
                        digital presence of a medical practice through service
                        presentation, appointment enquiries, responsive design
                        and an intuitive user experience.
                    </p>

                    <div class="project-tech">

                        <span>HTML5</span>
                        <span>CSS3</span>
                        <span>JavaScript</span>
                        <span>Responsive Design</span>

                    </div>

                    <div class="project-buttons">

                        <a href="https://clinichospital.netlify.app/"
                             target="_blank"
                             class="btn-primary">

                            Live Demo

                        </a>

                       
                        <a href="{{ route('projects.novacare') }}"
                            class="btn-secondary">

                                   View Case Study

                        </a>

                    </div>

                </div>

            </article>

            {{-- ==========================================
                 PROJECT
                 CourierXpress
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/courierxpress-dashboard.png') }}"
                    alt="CourierXpress">

                <div class="project-content">

                    <span class="project-status development">
                        🚧 In Active Development
                    </span>

                    <h3>CourierXpress</h3>

                    <p>
                        A full-featured courier and logistics management
                        platform built with Laravel to streamline shipment
                        tracking, customer management, dispatch operations,
                        delivery workflows and business reporting.
                    </p>

                    <div class="project-tech">

                        <span>Laravel</span>
                        <span>PHP</span>
                        <span>MySQL</span>
                        <span>Bootstrap</span>

                    </div>

                    <div class="project-buttons">

                        <a href="https://business-landing-kit.vercel.app/"
                           target="_blank"
                           class="btn-primary disabled"
                           aria-disabled="true">

                            Live Demo Soon

                        </a>

                        <a href="{{ route('projects.courierxpress') }}"
                           class="btn-secondary">

                            View Case Study

                        </a>

                    </div>

                </div>

            </article>




            {{-- ==========================================
                 PROJECT
                 Yellow Sail
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/yellow-sail.png') }}"
                    alt="Yellow Sail">

                <div class="project-content">

                    <span class="project-status development">
                        🚧 In Active Development
                    </span>

                    <h3>Yellow Sail</h3>

                    <p>
                        A modern multimedia streaming platform designed for
                        music and video delivery with user authentication,
                        playlists, media management and a responsive user
                        experience powered by modern web technologies.
                    </p>

                    <div class="project-tech">

                        <span>React</span>
                        <span>Firebase</span>
                        <span>JavaScript</span>
                        <span>Cloud Hosting</span>

                    </div>

                    <div class="project-buttons">

                        <a href="https://yellowsail.web.app/"
                           target="_blank"
                           class="btn-primary">

                            Live Demo

                        </a>

                       <a href="{{ route('projects.yellow-sail') }}"
                           class="btn-secondary">

                               View Case Study

                        </a>

                    </div>

                </div>

            </article>

            {{-- ==========================================
                 PROJECT
                 Logistics ERP System
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/logistics-management-system.png') }}"
                    alt="Logistics ERP System">

                <div class="project-content">

                    <span class="project-status planned">
                        📐 Design Phase
                    </span>

                    <h3>Logistics ERP System</h3>

                    <p>
                        A complete enterprise logistics solution for fleet
                        management, warehouse operations, inventory control,
                        shipment tracking, invoicing, analytics and executive
                        reporting for logistics companies.
                    </p>

                    <div class="project-tech">

                        <span>Laravel</span>
                        <span>PHP</span>
                        <span>MySQL</span>
                        <span>REST API</span>

                    </div>

                    <div class="project-buttons">

                        <a href="#"
                           class="btn-primary disabled"
                           aria-disabled="true">

                            Coming Soon

                        </a>

                    </div>

                </div>

            </article>

            {{-- ==========================================
                 PROJECT
                 Hotel & Hospitality Management Suite
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/hotel-restaurant-management.png') }}"
                    alt="Hotel & Hospitality Management Suite">

                <div class="project-content">

                    <span class="project-status planned">
                        📐 Design Phase
                    </span>

                    <h3>Hotel & Hospitality Management Suite</h3>

                    <p>
                        A complete hospitality platform supporting hotel
                        reservations, restaurant management, customer
                        relationship management, billing, inventory and
                        operational reporting.
                    </p>

                    <div class="project-tech">

                        <span>Laravel</span>
                        <span>PHP</span>
                        <span>MySQL</span>
                        <span>Bootstrap</span>

                    </div>

                    <div class="project-buttons">

                        <a href="#"
                           class="btn-primary disabled"
                           aria-disabled="true">

                            Coming Soon

                        </a>

                    </div>

                </div>

            </article>

            {{-- ==========================================
                 PROJECT
                 Smart School ERP
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/school-management-system.png') }}"
                    alt="Smart School ERP">

                <div class="project-content">

                    <span class="project-status planned">
                        📐 Design Phase
                    </span>

                    <h3>Smart School ERP</h3>

                    <p>
                        A modern education management platform supporting
                        admissions, student records, attendance, examinations,
                        finance, staff management, parent communication and
                        academic reporting from a unified dashboard.
                    </p>

                    <div class="project-tech">

                        <span>Laravel</span>
                        <span>PHP</span>
                        <span>MySQL</span>
                        <span>REST API</span>

                    </div>

                    <div class="project-buttons">

                        <a href="#"
                           class="btn-primary disabled"
                           aria-disabled="true">

                            Coming Soon

                        </a>

                    </div>

                </div>

            </article>

        </div>

    </div>

</section>

@endsection