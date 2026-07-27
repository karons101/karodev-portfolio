@extends('layouts.app')

@section('title', 'Contact')

@section('content')

{{-- ==========================================
     COMPONENT: CONTACT SECTION

     Purpose:
     Provides visitors with multiple ways
     to contact the developer and submit
     project enquiries.
========================================== --}}

<section class="contact">

    <div class="container">

        <span class="section-tag">
            Contact
        </span>

        <h2>Let's Build Something Great Together</h2>

        <p class="section-description">
            Whether you're looking to build a new application, improve an
            existing system or discuss a software project, I'd be happy
            to hear from you.
        </p>

        <div class="contact-grid">

            {{-- ==========================================
                 CONTACT INFORMATION
            ========================================== --}}

            <div class="contact-info">

                <h3>Get In Touch</h3>

                <p>
                    I'm available for freelance projects, full-time
                    opportunities and software consulting.
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

                </ul>

            </div>

<form
    class="contact-form"
    method="POST"
    action="#">

    @csrf

    {{-- ==========================================
         FULL NAME
    ========================================== --}}

    <div class="input-group">

        <label for="contactName" class="sr-only">
            Full Name
        </label>

        <span class="input-icon">
            ⚓
        </span>

        <input
            type="text"
            id="contactName"
            name="name"
            placeholder="Full Name"
            autocomplete="name"
            required>

    </div>

    {{-- ==========================================
         EMAIL
    ========================================== --}}

    <div class="input-group">

        <label for="contactEmail" class="sr-only">
            Email Address
        </label>

        <span class="input-icon">
            📧
        </span>

        <input
            type="email"
            id="contactEmail"
            name="email"
            placeholder="Email Address"
            autocomplete="email"
            required>

    </div>

    {{-- ==========================================
         SUBJECT
    ========================================== --}}

    <div class="input-group">

        <label for="contactSubject" class="sr-only">
            Subject
        </label>

        <span class="input-icon">
            🧭
        </span>

        <input
            type="text"
            id="contactSubject"
            name="subject"
            placeholder="Subject"
            autocomplete="off"
            required>

    </div>

    {{-- ==========================================
         MESSAGE
    ========================================== --}}

    <div class="input-group textarea-group">

        <label for="contactMessage" class="sr-only">
            Project Details
        </label>

        <span class="input-icon">
            🚢
        </span>

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