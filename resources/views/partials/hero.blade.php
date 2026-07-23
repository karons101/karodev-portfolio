{{-- ==========================================
     COMPONENT: HERO SECTION

     Purpose:
     Displays the primary introduction,
     professional summary and call-to-actions.
========================================== --}}

<section class="hero">

    <div class="hero-content">

        {{-- ==========================================
             COMPONENT: HERO TEXT
        ========================================== --}}

        <div class="hero-text">

            <span class="hero-badge">
                🚀 Available for Freelance & Remote Opportunities
            </span>

            <h1>
                Hi, I'm
                <span class="hero-name">
                    Oghenekaro Cletus 
                </span>
            </h1>

            <h2>Full-Stack Software Developer</h2>

            <p class="hero-intro">
                I build scalable, secure, and user-focused software solutions
                that help businesses grow through modern web technologies and
                clean engineering practices.
            </p>

            <p>
                I design and build modern web applications using Laravel,
                PHP, JavaScript, MySQL and modern frontend technologies.
            </p>

            <p>
                My focus is creating software that solves real business
                problems with clean architecture, maintainability and
                outstanding user experience.
            </p>

            {{-- ==========================================
                 COMPONENT: TECHNOLOGY STACK
            ========================================== --}}

            <div class="tech-stack">

                <span>Laravel</span>
                <span>PHP</span>
                <span>JavaScript</span>
                <span>MySQL</span>
                <span>Git</span>

            </div>

            {{-- ==========================================
                 COMPONENT: CALL TO ACTION
            ========================================== --}}

            <div class="hero-buttons">

                <a href="{{ route('projects') }}" class="btn-primary">
                    View My Projects
                </a>

                <a href="{{ route('contact') }}" class="btn-secondary">
                    Hire Me
                </a>

            </div>

        </div>

{{-- ==========================================
     COMPONENT: PROFILE PHOTO

     Purpose:
     Displays the developer's professional
     portrait on the homepage.
========================================== --}}

     <div class="profile-placeholder">

         <img
             src="{{ asset('images/avatars/oghenekaro-anakpoha.png') }}"
              alt="Oghenekaro Cletus Anakpoha"
            class="profile-image">

          <h3>Oghenekaro Cletus Anakpoha</h3>

         <p>Full-Stack Software Engineer</p>

        </div>

     </div>

  </div>

</section>