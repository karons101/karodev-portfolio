<nav>

    <div class="container">

        {{-- ==========================================
             BRAND LOGO
        ========================================== --}}

        <a href="{{ route('home') }}" class="logo">

            <span>Karo</span>Dev

        </a>

        {{-- ==========================================
             MOBILE MENU TOGGLE
        ========================================== --}}

        <button
            class="menu-toggle"
            id="menuToggle"
            aria-label="Toggle Navigation">

            <i class="fa-solid fa-anchor"></i>

        </button>

        {{-- ==========================================
             NAVIGATION LINKS
        ========================================== --}}

        <div class="nav-links">

            <ul>

                <li>
                    <a href="{{ route('home') }}"
                       class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}"
                       class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        About
                    </a>
                </li>

                <li>
                    <a href="{{ route('projects') }}"
                       class="{{ request()->routeIs('projects') ? 'active' : '' }}">
                        Projects
                    </a>
                </li>

                <li>
                    <a href="{{ route('services') }}"
                       class="{{ request()->routeIs('services') ? 'active' : '' }}">
                        Services
                    </a>
                </li>

                <li>
                    <a href="{{ route('skills') }}"
                       class="{{ request()->routeIs('skills') ? 'active' : '' }}">
                        Skills
                    </a>
                </li>

                <li>
                    <a href="{{ route('experience') }}"
                       class="{{ request()->routeIs('experience') ? 'active' : '' }}">
                        Experience
                    </a>
                </li>

                <li>
                    <a href="{{ route('certifications') }}"
                       class="{{ request()->routeIs('certifications') ? 'active' : '' }}">
                        Certifications
                    </a>
                </li>

                <li>
                    <a href="{{ route('blog') }}"
                       class="{{ request()->routeIs('blog') ? 'active' : '' }}">
                        Blog
                    </a>
                </li>

                <li>
                    <a href="{{ route('contact') }}"
                       class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact
                    </a>
                </li>

            </ul>

            {{-- ==========================================
                 DOWNLOAD CV BUTTON
            ========================================== --}}

            <a href="{{ asset('documents/Oghenekaro-Cletus-Anakpoha-CV.pdf') }}"
               target="_blank"
               class="btn-primary nav-cv-btn">

                <i class="fa-solid fa-download"></i>

                Download CV

            </a>

        </div>

    </div>

</nav>