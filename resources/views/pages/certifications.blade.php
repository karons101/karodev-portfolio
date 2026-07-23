@extends('layouts.app')

@section('title', 'Certifications')

@section('content')

{{-- ==========================================
     COMPONENT: CERTIFICATIONS SECTION

     Purpose:
     Displays professional certifications,
     training and continuous learning.
========================================== --}}

<section class="certifications">

    <div class="container">

        <span class="section-tag">
            Certifications
        </span>

        <h2>Professional Learning & Certifications</h2>

        <p class="section-description">
            Continuous learning is a core part of my software engineering journey.
            Below are certifications and professional training that strengthen my
            technical knowledge and practical skills.
        </p>

        <div class="certifications-grid">

            {{-- ==========================================
                 CERTIFICATION CARD
                 Laravel Development
            ========================================== --}}

            <article class="certification-card">

                <h3>Laravel Web Development</h3>

                <h4>Self-Paced Professional Learning</h4>

                <p>
                    Advanced Laravel application development covering routing,
                    authentication, Blade, Eloquent ORM, migrations and MVC architecture.
                </p>

                <a href="#" class="btn-primary">
                    View Certificate
                </a>

            </article>

            {{-- ==========================================
                 CERTIFICATION CARD
                 Full-Stack Development
            ========================================== --}}

            <article class="certification-card">

                <h3>Full-Stack Web Development</h3>

                <h4>Professional Learning</h4>

                <p>
                    Modern web application development using PHP, JavaScript,
                    MySQL, HTML and CSS with responsive design principles.
                </p>

                <a href="#" class="btn-primary">
                    View Certificate
                </a>

            </article>

            {{-- ==========================================
                 CERTIFICATION CARD
                 Git & GitHub
            ========================================== --}}

            <article class="certification-card">

                <h3>Git & GitHub Version Control</h3>

                <h4>Professional Learning</h4>

                <p>
                    Source control, collaboration workflows,
                    branching strategies and repository management.
                </p>

                <a href="#" class="btn-primary">
                    View Certificate
                </a>

            </article>

        </div>

    </div>

</section>

@endsection