<nav>
    <div class="container">

        {{-- ==========================================
             COMPONENT: BRAND LOGO

             Purpose:
             Displays the website brand and
             links back to the homepage.
        ========================================== --}}

        <a href="{{ route('home') }}" class="logo">
            <span>Karo</span>Dev
        </a>

        {{-- ==========================================
             COMPONENT: NAVIGATION LINKS

             Purpose:
             Groups all navigation links
             for consistent styling.
        ========================================== --}}

        <div class="nav-links">

            <ul>

                {{-- ==========================================
                     COMPONENT: HOME LINK

                     Purpose:
                     Navigates users to the homepage.
                ========================================== --}}

                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>

                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('projects') }}">Projects</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('skills') }}">Skills</a></li>
                <li><a href="{{ route('experience') }}">Experience</a></li>
                <li><a href="{{ route('certifications') }}">Certifications</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>

            </ul>

        </div>

    </div>
</nav>