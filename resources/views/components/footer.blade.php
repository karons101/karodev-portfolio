<footer>

    {{-- ==========================================
         COMPONENT: FOOTER

         Purpose:
         Displays the website footer including
         branding, social links, navigation,
         technologies, resources and contact.
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
     SOCIAL CONNECT BAR
========================================== --}}

<div class="social-connect">

    <h4>Connect With Me</h4>

    <div class="social-icons">

        {{-- GitHub --}}

        <a href="https://github.com/karons101"
           target="_blank"
           rel="noopener noreferrer"
           title="GitHub"
           aria-label="GitHub"
           data-tooltip="GitHub">

            <i class="fa-brands fa-github"></i>

        </a>

        {{-- GitLab --}}

        <a href="https://gitlab.com/karons1"
           target="_blank"
           rel="noopener noreferrer"
           title="GitLab"
           aria-label="GitLab"
           data-tooltip="GitLab">

            <i class="fa-brands fa-gitlab"></i>

        </a>

        {{-- Telegram --}}

        <a href="https://t.me/karons101"
           target="_blank"
           rel="noopener noreferrer"
           title="Telegram"
           aria-label="Telegram"
           data-tooltip="Telegram">

            <i class="fa-brands fa-telegram"></i>

        </a>

        {{-- Facebook --}}

        <a href="https://facebook.com/oghenekaro.anakpoha"
           target="_blank"
           rel="noopener noreferrer"
           title="Facebook"
           aria-label="Facebook"
           data-tooltip="Facebook">

            <i class="fa-brands fa-facebook-f"></i>

        </a>

        {{-- X (Twitter) --}}

        <a href="https://x.com/karonstical"
           target="_blank"
           rel="noopener noreferrer"
           title="X (Twitter)"
           aria-label="X (Twitter)"
           data-tooltip="X">

            <i class="fa-brands fa-x-twitter"></i>

        </a>

        {{-- WhatsApp --}}

        <a href="https://wa.me/2348131154753"
           target="_blank"
           rel="noopener noreferrer"
           title="WhatsApp"
           aria-label="WhatsApp"
           data-tooltip="WhatsApp">

            <i class="fa-brands fa-whatsapp"></i>

        </a>

    </div>

</div>

        {{-- ==========================================
             FOOTER GRID
        ========================================== --}}

        <div class="footer-grid">

            {{-- QUICK LINKS --}}

            <div class="footer-links">

                <h4>Quick Links</h4>

                <ul>

                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('projects') }}">Projects</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('skills') }}">Skills</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>

                </ul>

            </div>

            {{-- TECHNOLOGIES --}}

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

            {{-- RESOURCES --}}

            <div class="footer-links">

                <h4>Resources</h4>

                <ul>

                    <li><a href="#">Download CV</a></li>
                    <li><a href="#">Certificates</a></li>
                    <li><a href="#">Case Studies</a></li>
                    <li><a href="#">Blog Articles</a></li>

                </ul>

            </div>

            {{-- CONTACT --}}

            <div class="footer-contact">

                <h4>Contact</h4>

                <p>Delta State, Nigeria</p>

                <p>karonstical@gmail.com</p>

                <p>Available for Freelance & Remote Opportunities</p>

            </div>

        </div>

        {{-- ==========================================
             COPYRIGHT
        ========================================== --}}

        <div class="footer-bottom">

            <p>

                &copy; {{ date('Y') }}

                KaroDev.

                All Rights Reserved.

            </p>

            <p class="footer-signature">
                    Engineered with
                <span class="footer-heart">💚</span>
                            by
                <strong>KaroDev</strong>
               <span class="footer-ship">⛵</span>
             </p>

        </div>

    </div>

</footer>


{{-- ==========================================
     FLOATING WHATSAPP BUTTON
========================================== --}}

<a href="https://wa.me/2348131154753"
   class="whatsapp-float"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Chat on WhatsApp">

    <i class="fa-brands fa-whatsapp"></i>

</a>

{{-- ==========================================
     BACK TO TOP BUTTON
========================================== --}}

<button id="backToTop"
        class="back-to-top"
        aria-label="Back to Top">

    <i class="fa-solid fa-arrow-up"></i>

</button>