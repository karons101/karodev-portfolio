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
             Displays the main website navigation
             and highlights the active page.
        ========================================== --}}

        <div class="nav-links">

            <ul>

                {{-- ==========================================
                     COMPONENT: HOME LINK

                     Purpose:
                     Navigates users to the homepage.
                ========================================== --}}

                <li>
                    <a href="{{ route('home') }}"
                       class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                {{-- ==========================================
                     COMPONENT: ABOUT LINK
                ========================================== --}}

                <li>
                    <a href="{{ route('about') }}"
                       class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        About
                    </a>
                </li>

                {{-- ==========================================
                     COMPONENT: PROJECTS LINK
                ========================================== --}}

                <li>
                    <a href="{{ route('projects') }}"
                       class="{{ request()->routeIs('projects') ? 'active' : '' }}">
                        Projects
                    </a>
                </li>

                {{-- ==========================================
                     COMPONENT: SERVICES LINK
                ========================================== --}}

                <li>
                    <a href="{{ route('services') }}"
                       class="{{ request()->routeIs('services') ? 'active' : '' }}">
                        Services
                    </a>
                </li>

                {{-- ==========================================
                     COMPONENT: SKILLS LINK
                ========================================== --}}

                <li>
                    <a href="{{ route('skills') }}"
                       class="{{ request()->routeIs('skills') ? 'active' : '' }}">
                        Skills
                    </a>
                </li>

                {{-- ==========================================
                     COMPONENT: EXPERIENCE LINK
                ========================================== --}}

                <li>
                    <a href="{{ route('experience') }}"
                       class="{{ request()->routeIs('experience') ? 'active' : '' }}">
                        Experience
                    </a>
                </li>

                {{-- ==========================================
                     COMPONENT: CERTIFICATIONS LINK
                ========================================== --}}

                <li>
                    <a href="{{ route('certifications') }}"
                       class="{{ request()->routeIs('certifications') ? 'active' : '' }}">
                        Certifications
                    </a>
                </li>

                {{-- ==========================================
                     COMPONENT: BLOG LINK
                ========================================== --}}

                <li>
                    <a href="{{ route('blog') }}"
                       class="{{ request()->routeIs('blog') ? 'active' : '' }}">
                        Blog
                    </a>
                </li>

                {{-- ==========================================
                     COMPONENT: CONTACT LINK
                ========================================== --}}

                <li>
                    <a href="{{ route('contact') }}"
                       class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>