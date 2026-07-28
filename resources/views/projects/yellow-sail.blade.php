@extends('layouts.app')

@section('title', 'Yellow Sail')

@section('content')

{{-- ==========================================
     PROJECT HEADER
========================================== --}}

<section class="project-details">

    <div class="container">

        <span class="section-tag">
            Featured Project
        </span>

        <h1>Yellow Sail</h1>

        <p class="section-description">
            A modern music and video streaming web application designed to deliver
            an engaging multimedia experience through responsive design,
            interactive interfaces and modern frontend technologies.
        </p>


        <img
            src="{{ asset('images/projects/yellow-sail.png') }}"
            alt="Yellow Sail Application"
            class="project-banner">


        <div class="project-buttons">


            <a href="https://yellowsail.web.app/"
               target="_blank"
               class="btn-primary">

                Live Demo

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



{{-- ==========================================
     PROJECT OVERVIEW
========================================== --}}

<section class="project-overview" id="overview">

    <div class="container">


        <h2>Project Overview</h2>


        <p>

            Yellow Sail is a modern multimedia web application developed to
            provide users with an immersive music and video streaming experience.
            The project focuses on delivering a clean user interface, responsive
            layouts and smooth content presentation across different devices.

            Built using React and Firebase technologies, the application
            demonstrates modern frontend development practices, component-based
            architecture and cloud-based application deployment.

        </p>



        <div class="tech-stack">

            <span>React</span>
            <span>JavaScript</span>
            <span>Firebase</span>
            <span>HTML5</span>
            <span>CSS3</span>
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


            <li>✔ Modern Music & Video Streaming Interface</li>

            <li>✔ Responsive Design Across Devices</li>

            <li>✔ Interactive User Experience</li>

            <li>✔ React Component-Based Architecture</li>

            <li>✔ Firebase Cloud Integration</li>

            <li>✔ Fast Web Application Deployment</li>

            <li>✔ Modern Frontend Development Practices</li>


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
                src="{{ asset('images/projects/yellow-sail.png') }}"
                alt="Yellow Sail Homepage">


            <img
                src="{{ asset('images/projects/yellow-sail.png') }}"
                alt="Yellow Sail Interface">


            <img
                src="{{ asset('images/projects/yellow-sail.png') }}"
                alt="Yellow Sail Mobile View">


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

            The main challenge was creating a smooth multimedia experience while
            maintaining performance, responsiveness and visual consistency.

            React component architecture was used to organise the application
            interface efficiently, while Firebase services supported modern
            cloud-based deployment and application management.

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

            Yellow Sail demonstrates practical experience in modern frontend
            development, responsive UI engineering, cloud deployment and
            interactive web application design.

            The project represents a strong foundation for future expansion
            into a complete multimedia platform with authentication,
            subscriptions and advanced content management features.

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


            <a href="https://yellowsail.web.app/"
               target="_blank"
               class="btn-primary">


                Visit Live Demo


            </a>



            <a href="https://github.com/karons101/yellow-sail"
               target="_blank"
               class="btn-secondary">


                View Source Code


            </a>



            <a href="{{ route('projects') }}"
               class="btn-secondary">


                Back to Projects


            </a>


        </div>


    </div>


</section>



@endsection