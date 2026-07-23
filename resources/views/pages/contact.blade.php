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
                        karonstical@gmail.com
                    </li>

                    <li>
                        <strong>Location:</strong><br>
                        Delta State, Nigeria
                    </li>

                    <li>
                        <strong>Availability:</strong><br>
                        Open for opportunities
                    </li>

                </ul>

            </div>

            {{-- ==========================================
                 CONTACT FORM
            ========================================== --}}

            <form class="contact-form">

                <input
                    type="text"
                    placeholder="Full Name">

                <input
                    type="email"
                    placeholder="Email Address">

                <input
                    type="text"
                    placeholder="Subject">

                <textarea
                    rows="6"
                    placeholder="Tell me about your project..."></textarea>

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