@extends('layouts.portfolio')

@section('title', 'Skills')

@section('content')

{{-- ==========================================
     COMPONENT: SKILLS SECTION

     Purpose:
     Showcases the developer's technical
     skills using professional skill cards.
========================================== --}}

<section class="skills">

    <div class="container">

        <span class="section-tag">
            Technical Skills
        </span>

        <h2>Technologies I Work With</h2>

        <p class="section-description">
            I build modern, scalable applications using industry-standard
            technologies across frontend, backend, databases and version control.
        </p>

        <div class="skills-grid">

            {{-- ==========================================
                 COMPONENT: LARAVEL
            ========================================== --}}

            <div class="skill-card">
                <h3>Laravel</h3>
                <p>Building scalable and secure web applications using the Laravel framework.</p>
            </div>

            {{-- ==========================================
                 COMPONENT: PHP
            ========================================== --}}

            <div class="skill-card">
                <h3>PHP</h3>
                <p>Developing robust backend systems and RESTful APIs.</p>
            </div>

            {{-- ==========================================
                 COMPONENT: JAVASCRIPT
            ========================================== --}}

            <div class="skill-card">
                <h3>JavaScript</h3>
                <p>Creating dynamic, interactive and responsive user interfaces.</p>
            </div>

            {{-- ==========================================
                 COMPONENT: MYSQL
            ========================================== --}}

            <div class="skill-card">
                <h3>MySQL</h3>
                <p>Designing efficient relational databases and optimized queries.</p>
            </div>

            {{-- ==========================================
                 COMPONENT: GIT
            ========================================== --}}

            <div class="skill-card">
                <h3>Git & GitHub</h3>
                <p>Version control, collaboration and professional software workflows.</p>
            </div>

            {{-- ==========================================
                 COMPONENT: HTML & CSS
            ========================================== --}}

            <div class="skill-card">
                <h3>HTML & CSS</h3>
                <p>Building responsive, accessible and modern user interfaces.</p>
            </div>

        </div>

    </div>

</section>

@endsection