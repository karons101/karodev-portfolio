@extends('layouts.portfolio')

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
                 ABOUT IMAGE
            ========================================== --}}

            <div class="about-image">

                <img
                    src="{{ asset('images/avatars/oghenekaro-anakpoha.png') }}"
                    alt="Oghenekaro Cletus Anakpoha">

            </div>

            {{-- ==========================================
                 ABOUT CONTENT
            ========================================== --}}

            <div class="about-content">

                <span class="section-tag">
                    About Me
                </span>

                <h2>
                    Building Software That Solves Real Business Problems
                </h2>

                <p>
                    I'm <strong>Oghenekaro Cletus Anakpoha</strong>, a passionate
                    Full-Stack Software Developer dedicated to building modern,
                    scalable and secure web applications that help businesses
                    improve efficiency, automate processes and create better
                    digital experiences.
                </p>

                <p>
                    My primary technology stack includes Laravel, PHP,
                    JavaScript, MySQL, HTML5 and CSS3, while continuously
                    expanding my knowledge of modern software engineering,
                    cloud technologies and enterprise application development.
                </p>

                <p>
                    I enjoy transforming ideas into reliable software products
                    through clean architecture, maintainable code and intuitive
                    user experiences that deliver real business value.
                </p>

                <a href="{{ route('contact') }}"
                   class="btn-primary">

                    Let's Work Together

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ==========================================
     MY JOURNEY
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>My Journey</h2>

        <p>

            My software development journey began with a curiosity for creating
            websites and solving everyday problems through technology.
            What started with learning HTML, CSS and JavaScript has evolved into
            developing complete business applications using Laravel and modern
            web technologies.

        </p>

        <p>

            Every project I build strengthens my ability to design scalable,
            user-friendly and maintainable software solutions while continually
            improving my engineering skills and understanding of business
            requirements.

        </p>

    </div>

</section>


{{-- ==========================================
     DEVELOPMENT PHILOSOPHY
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>Development Philosophy</h2>

        <p>

            I believe great software should do more than function correctly.
            It should solve real business problems, be easy to maintain,
            deliver excellent user experiences and remain scalable as
            organisations grow.

        </p>

        <p>

            My approach focuses on writing clean, readable code,
            building responsive interfaces and following software
            engineering best practices that produce reliable,
            professional applications.

        </p>

    </div>

</section>


{{-- ==========================================
     CORE STRENGTHS
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>Core Strengths</h2>

        <ul class="feature-list">

            <li>✔ Full-Stack Web Development</li>

            <li>✔ Laravel Application Development</li>

            <li>✔ Responsive UI / UX Design</li>

            <li>✔ Database Design & Management</li>

            <li>✔ REST API Integration</li>

            <li>✔ Software Architecture</li>

            <li>✔ Business Process Automation</li>

            <li>✔ Continuous Learning & Improvement</li>

        </ul>

    </div>

</section>


{{-- ==========================================
     WHY WORK WITH ME
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>Why Work With Me</h2>

        <p>

            I enjoy collaborating with businesses, startups and organisations
            to build software that creates measurable value.
            My goal is not simply to write code, but to understand business
            challenges and develop practical, maintainable solutions that
            support long-term growth.

        </p>

        <div class="tech-stack">

            <span>Problem Solver</span>

            <span>Clean Code</span>

            <span>Reliable Delivery</span>

            <span>Professional Communication</span>

            <span>Scalable Solutions</span>

            <span>Continuous Improvement</span>

        </div>

    </div>

</section>


{{-- ==========================================
     PROFESSIONAL TIMELINE
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>Professional Timeline</h2>

        <ul class="feature-list">

            <li>✔ Began learning modern web development.</li>

            <li>✔ Built responsive frontend websites.</li>

            <li>✔ Developed NovaCare Medical Centre.</li>

            <li>✔ Developed Yellow Sail multimedia platform.</li>

            <li>✔ Built CourierXpress logistics application.</li>

            <li>✔ Currently expanding an enterprise software portfolio.</li>

            <li>✔ Future projects include Logistics ERP, Hotel ERP and Smart School ERP.</li>

        </ul>

    </div>

</section>


{{-- ==========================================
     CURRENT GOAL
========================================== --}}

<section class="project-overview">

    <div class="container">

        <h2>Current Goal</h2>

        <p>

            I'm actively building high-quality software solutions while seeking
            opportunities to contribute to innovative teams, collaborate with
            businesses and continue growing as a professional software engineer.
            Every project in this portfolio represents another step toward
            delivering enterprise-grade software that makes a real impact.

        </p>

    </div>

</section>

@endsection