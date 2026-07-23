@extends('layouts.app')

@section('title', 'Experience')

@section('content')

{{-- ==========================================
     COMPONENT: EXPERIENCE SECTION

     Purpose:
     Highlights the developer's professional
     journey, major projects and career growth.
========================================== --}}

<section class="experience">

    <div class="container">

        <span class="section-tag">
            Experience
        </span>

        <h2>Professional Journey</h2>

        <p class="section-description">
            My experience is built through designing and developing software
            solutions that solve real-world business challenges across
            multiple industries.
        </p>

        <div class="timeline">

            {{-- ==========================================
                 TIMELINE ITEM
                 Full-Stack Software Developer
            ========================================== --}}

            <article class="timeline-item">

                <div class="timeline-dot"></div>

                <div class="timeline-content">

                    <span class="timeline-year">
                        Present
                    </span>

                    <h3>Full-Stack Software Developer</h3>

                    <h4>Independent Software Engineer</h4>

                    <p>
                        Designing and developing scalable web applications
                        using Laravel, PHP, JavaScript and MySQL while
                        following modern software engineering principles.
                    </p>

                </div>

            </article>

            {{-- ==========================================
                 TIMELINE ITEM
                 CourierXpress
            ========================================== --}}

            <article class="timeline-item">

                <div class="timeline-dot"></div>

                <div class="timeline-content">

                    <span class="timeline-year">
                        Current Project
                    </span>

                    <h3>CourierXpress</h3>

                    <h4>Logistics Management Platform</h4>

                    <p>
                        Developing a comprehensive logistics application
                        featuring shipment tracking, dispatch management,
                        customer management and reporting.
                    </p>

                </div>

            </article>

            {{-- ==========================================
                 TIMELINE ITEM
                 Yellow Sail
            ========================================== --}}

            <article class="timeline-item">

                <div class="timeline-dot"></div>

                <div class="timeline-content">

                    <span class="timeline-year">
                        Current Project
                    </span>

                    <h3>Yellow Sail</h3>

                    <h4>Music & Video Streaming Platform</h4>

                    <p>
                        Developing a multimedia platform focused on modern
                        entertainment, responsive design and engaging
                        user experiences.
                    </p>

                </div>

            </article>

            {{-- ==========================================
                 TIMELINE ITEM
                 NovaCare Medical Centre
            ========================================== --}}

            <article class="timeline-item">

                <div class="timeline-dot"></div>

                <div class="timeline-content">

                    <span class="timeline-year">
                        Completed
                    </span>

                    <h3>NovaCare Medical Centre</h3>

                    <h4>Healthcare Website</h4>

                    <p>
                        Designed and developed a professional healthcare
                        website with responsive layouts and modern
                        user interface principles.
                    </p>

                </div>

            </article>

        </div>

    </div>

</section>

@endsection