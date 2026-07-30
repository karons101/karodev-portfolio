@extends('layouts.portfolio')

@section('title', 'Contact')

@section('content')

{{-- ==========================================
     CONTACT SECTION
========================================== --}}

<section class="contact">

    <div class="container">

        <span class="section-tag">
            Contact
        </span>

        <h2>Let's Build Something Great Together</h2>

        <p class="section-description">
            Whether you're looking to build a new application,
            improve an existing system or discuss a software
            project, I'd be happy to hear from you.
        </p>

        <div class="contact-grid">

            {{-- ==========================================
                 CONTACT INFORMATION
            ========================================== --}}

            <div class="contact-info">

                <h3>Get In Touch</h3>

                <p>
                    I'm available for freelance projects,
                    full-time opportunities and software consulting.
                </p>

                <ul>

                    <li>
                        <strong>Email:</strong><br>

                        <a href="mailto:karonstical@gmail.com">
                            karonstical@gmail.com
                        </a>
                    </li>

                    <li>
                        <strong>Location:</strong><br>

                        Delta State, Nigeria
                    </li>

                    <li>
                        <strong>Availability:</strong><br>

                        Open for Freelance, Remote and Full-Time Opportunities
                    </li>

                    <li>
                        <strong>Response Time:</strong><br>

                        Usually within 24 Hours
                    </li>

                </ul>

                {{-- ==========================================
                     HIRE ME
                ========================================== --}}

                <div class="contact-cta">

                    <h3>Available for New Projects</h3>

                    <p>
                        Looking for a Laravel Full-Stack Developer
                        to build your next software solution?
                        Let's discuss your project.
                    </p>

                </div>

                {{-- ==========================================
                     SOCIAL LINKS
                ========================================== --}}

                <div class="contact-social">

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

          {{-- Telegram --}}

          <a href="https://t.me/karons101"
                   target="_blank"
                  rel="noopener noreferrer"
               title="Telegram"
               aria-label="Telegram"
               data-tooltip="Telegram">

                 <i class="fa-brands fa-telegram"></i>

             </a>

              {{-- X (Twitter) --}}

                   <a href="https://x.com/@karonstical"
                 target="_blank"
                     rel="noopener noreferrer"
                title="X (Twitter)"
                       aria-label="X (Twitter)"
                       data-tooltip="X">

                   <i class="fa-brands fa-x-twitter"></i>

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

               {{-- Email --}}

               <a href="mailto:karonstical@gmail.com"
                  title="Email"
                  aria-label="Email"
                  data-tooltip="Email">

                    <i class="fa-solid fa-envelope"></i>

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

            </div>

            {{-- ==========================================
                 CONTACT FORM
            ========================================== --}}

            <form
                class="contact-form"
                method="POST"
                action="#">

                @csrf

                <div class="input-group">

                    <label for="contactName" class="sr-only">
                        Full Name
                    </label>

                    <span class="input-icon">⚓</span>

                    <input
                        type="text"
                        id="contactName"
                        name="name"
                        placeholder="Full Name"
                        autocomplete="name"
                        required>

                </div>

                <div class="input-group">

                    <label for="contactEmail" class="sr-only">
                        Email Address
                    </label>

                    <span class="input-icon">📧</span>

                    <input
                        type="email"
                        id="contactEmail"
                        name="email"
                        placeholder="Email Address"
                        autocomplete="email"
                        required>

                </div>

                <div class="input-group">

                    <label for="contactSubject" class="sr-only">
                        Subject
                    </label>

                    <span class="input-icon">🧭</span>

                    <input
                        type="text"
                        id="contactSubject"
                        name="subject"
                        placeholder="Subject"
                        required>

                </div>

                <div class="input-group textarea-group">

                    <label for="contactMessage" class="sr-only">
                        Project Details
                    </label>

                    <span class="input-icon">🚢</span>

                    <textarea
                        id="contactMessage"
                        name="message"
                        rows="6"
                        placeholder="Tell me about your project..."
                        required></textarea>

                </div>

                <button
                    type="submit"
                    class="btn-primary">

                    Send Message

                </button>

            </form>

        </div>

    </div>

</section>

@endsection