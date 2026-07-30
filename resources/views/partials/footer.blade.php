<footer>

    {{-- ==========================================
         COMPONENT: FOOTER

         Purpose:
         Displays the website footer including
         branding, navigation, technologies,
         contact information and social media.
    ========================================== --}}

    <div class="container">

        {{-- ==========================================
             FOOTER BRAND
        ========================================== --}}

        <div class="footer-brand-center">

            <h2>
                <span>Karo</span>Dev
            </h2>

            <p>
                Building scalable, secure and modern software solutions
                that help businesses grow through technology.
            </p>

        </div>

        {{-- ==========================================
             SOCIAL MEDIA
        ========================================== --}}

        <div class="social-connect">

            <h4>Connect With Me</h4>

            <div class="social-icons">

                <a href="https://github.com/karons101"
                   target="_blank"
                   data-tooltip="GitHub"
                   aria-label="GitHub">

                    <i class="fa-brands fa-github"></i>

                </a>

                <a href="https://gitlab.com/karons1"
                       target="_blank"
                       rel="noopener noreferrer"
                        title="GitLab"
                        aria-label="GitLab">

                       <i class="fa-brands fa-gitlab"></i>

                 </a>

                <a href="https://x.com/"
                   target="_blank"
                   data-tooltip="X (Twitter)"
                   aria-label="X">

                    <i class="fa-brands fa-x-twitter"></i>

                </a>

                <a href="https://facebook.com/"
                   target="_blank"
                   data-tooltip="Facebook"
                   aria-label="Facebook">

                    <i class="fa-brands fa-facebook-f"></i>

                </a>

                <a href="mailto:karonstical@gmail.com"
                   data-tooltip="Email"
                   aria-label="Email">

                    <i class="fa-solid fa-envelope"></i>

                </a>

                <a href="https://wa.me/2340000000000"
                   target="_blank"
                   data-tooltip="WhatsApp"
                   aria-label="WhatsApp">

                    <i class="fa-brands fa-whatsapp"></i>

                </a>

            </div>

        </div>

        {{-- ==========================================
             FOOTER GRID
        ========================================== --}}

        <div class="footer-grid">

            {{-- ==========================================
                 QUICK LINKS
            ========================================== --}}

            <div class="footer-links">

                <h4>Quick Links</h4>

                <ul>

                    <li><a href="{{ route('home') }}">Home</a></li>

                    <li><a href="{{ route('about') }}">About</a></li>

                    <li><a href="{{ route('projects') }}">Projects</a></li>

                    <li><a href="{{ route('services') }}">Services</a></li>

                    <li><a href="{{ route('contact') }}">Contact</a></li>

                </ul>

            </div>

            {{-- ==========================================
                 TECHNOLOGIES
            ========================================== --}}

            <div class="footer-links">

                <h4>Technologies</h4>

                <ul>

                    <li>Laravel</li>

                    <li>PHP</li>

                    <li>JavaScript</li>

                    <li>MySQL</li>

                    <li>Git</li>

                </ul>

            </div>

            {{-- ==========================================
                 SERVICES
            ========================================== --}}

            <div class="footer-links">

                <h4>Services</h4>

                <ul>

                    <li>Web Development</li>

                    <li>Laravel Development</li>

                    <li>UI / UX Design</li>

                    <li>API Development</li>

                    <li>Software Consulting</li>

                </ul>

            </div>

            {{-- ==========================================
                 CONTACT
            ========================================== --}}

            <div class="footer-contact">

                <h4>Contact</h4>

                <p>Delta State, Nigeria</p>

                <p>

                    <a href="mailto:karonstical@gmail.com">

                        karonstical@gmail.com

                    </a>

                </p>

                <p>

                    Available for Freelance,
                    Remote and Full-Time Opportunities.

                </p>

            </div>

        </div>

        {{-- ==========================================
             FOOTER COPYRIGHT
        ========================================== --}}

        <div class="footer-bottom">

            <p>

                &copy; {{ date('Y') }}
                KaroDev. All Rights Reserved.

            </p>

            <p class="footer-signature">

                Designed & Developed with ❤️ by
                <strong>KaroDev</strong>

            </p>

        </div>

    </div>

</footer>