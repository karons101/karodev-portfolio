@extends('layouts.app')

@section('title', 'Projects')

@section('content')

{{-- ==========================================
     COMPONENT: PROJECTS SECTION

     Purpose:
     Showcases featured software projects,
     demonstrating technical expertise,
     problem-solving ability and software
     engineering experience.
========================================== --}}

<section class="projects">

    <div class="container">

        <span class="section-tag">
            My Portfolio
        </span>

        <h2>Featured Software Projects</h2>

        <p class="section-description">
            A growing collection of software applications designed and developed
            to solve real-world business challenges using modern technologies,
            clean architecture and scalable engineering practices.
        </p>

        <div class="projects-grid">

            {{-- ==========================================
                 COMPONENT: PROJECT CARD
                 NovaCare Medical Centre
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/novacare-medical-centre.png') }}"
                    alt="NovaCare Medical Centre">

                <div class="project-content">

                    <span class="project-status completed">
                        ✓ Completed
                    </span>

                    <h3>NovaCare Medical Centre</h3>

                    <p>
                        A modern medical centre website designed to provide
                        healthcare information, services, appointment booking
                        and a professional online presence.
                    </p>

                    <div class="project-tech">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                    </div>

                    <div class="project-buttons">

                        <a href="#" class="btn-primary">
                            Live Demo
                        </a>

                        <a href="#" class="btn-secondary">
                            View Details
                        </a>

                    </div>

                </div>

            </article>

            {{-- ==========================================
                 COMPONENT: PROJECT CARD
                 CourierXpress
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/courierxpress-dashboard.png') }}"
                    alt="CourierXpress">

                <div class="project-content">

                    <span class="project-status development">
                        🚧 In Development
                    </span>

                    <h3>CourierXpress</h3>

                    <p>
                        A Laravel-powered courier and logistics management
                        platform for shipment tracking, dispatch management
                        and delivery operations.
                    </p>

                    <div class="project-tech">
                        <span>Laravel</span>
                        <span>PHP</span>
                        <span>MySQL</span>
                    </div>

                    <div class="project-buttons">

                        <a href="#" class="btn-primary">
                            Live Demo
                        </a>

                        <a href="https://gitlab.com/karons1/courier-service"
                           target="_blank"
                           class="btn-secondary">
                            Source Code
                        </a>

                    </div>

                </div>

            </article>

            {{-- ==========================================
                 COMPONENT: PROJECT CARD
                 Yellow Sail
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/yellow-sail.png') }}"
                    alt="Yellow Sail">

                <div class="project-content">

                    <span class="project-status development">
                        🚧 In Development
                    </span>

                    <h3>Yellow Sail</h3>

                    <p>
                        A modern music and video streaming web application
                        built to provide multimedia entertainment with an
                        engaging user experience.
                    </p>

                    <div class="project-tech">
                        <span>React</span>
                        <span>Firebase</span>
                        <span>JavaScript</span>
                    </div>

                    <div class="project-buttons">

                        <a href="https://yellowsail-app.web.app"
                           target="_blank"
                           class="btn-primary">
                            Live Demo
                        </a>

                        <a href="https://github.com/karons101/yellow-sail"
                           target="_blank"
                           class="btn-secondary">
                            Source Code
                        </a>

                    </div>

                </div>

            </article>

            {{-- ==========================================
                 COMPONENT: PROJECT CARD
                 Logistics Management System
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/logistics-management-system.png') }}"
                    alt="Logistics Management System">

                <div class="project-content">

                    <span class="project-status planned">
                        📋 Planned
                    </span>

                    <h3>Logistics Management System</h3>

                    <p>
                        A comprehensive logistics platform for fleet
                        management, order tracking, warehouse operations
                        and business reporting.
                    </p>

                    <div class="project-tech">
                        <span>Laravel</span>
                        <span>PHP</span>
                        <span>MySQL</span>
                    </div>

                </div>

            </article>

            {{-- ==========================================
                 COMPONENT: PROJECT CARD
                 Hotel & Restaurant Management
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/hotel-restaurant-management.png') }}"
                    alt="Hotel & Restaurant Management">

                <div class="project-content">

                    <span class="project-status planned">
                        📋 Planned
                    </span>

                    <h3>Hotel & Restaurant Management</h3>

                    <p>
                        An integrated management solution for reservations,
                        restaurant operations, inventory, billing and customer
                        management.
                    </p>

                    <div class="project-tech">
                        <span>Laravel</span>
                        <span>PHP</span>
                        <span>MySQL</span>
                    </div>

                </div>

            </article>

            {{-- ==========================================
                 COMPONENT: PROJECT CARD
                 School Administration System
            ========================================== --}}

            <article class="project-card">

                <img
                    src="{{ asset('images/projects/school-management-system.png') }}"
                    alt="School Administration System">

                <div class="project-content">

                    <span class="project-status planned">
                        📋 Planned
                    </span>

                    <h3>School Administration System</h3>

                    <p>
                        A complete school management platform for students,
                        teachers, examinations, attendance, finance and
                        administration.
                    </p>

                    <div class="project-tech">
                        <span>Laravel</span>
                        <span>PHP</span>
                        <span>MySQL</span>
                    </div>

                </div>

            </article>

        </div>

    </div>

</section>

@endsection