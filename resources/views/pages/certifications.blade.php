@extends('layouts.portfolio')

@section('title', 'Certifications')

@section('content')

{{-- ==========================================
     COMPONENT: CERTIFICATIONS SECTION

     Purpose:
     Displays professional certifications,
     training and continuous learning.
========================================== --}}

<section class="certifications">

    <div class="container">

        <span class="section-tag">
            Certifications
        </span>

        <h2>Professional Learning & Certifications</h2>

        <p class="section-description">
            Continuous learning is a core part of my software engineering journey.
            Below are certifications and professional training that strengthen my
            technical knowledge and practical skills.
        </p>

        <div class="certifications-grid">

            @forelse ($certifications as $certification)

                {{-- ==========================================
                     CERTIFICATION CARD

                     Each card is generated from a
                     database-backed Certification record.
                ========================================== --}}

                <article class="certification-card">

                    <h3>
                        {{ $certification->name }}
                    </h3>

                    <h4>
                        {{ $certification->issuing_organization }}
                    </h4>

                    <p>
                        Issued:
                        {{ $certification->issue_date
                            ? $certification->issue_date->format('F Y')
                            : 'Date unavailable'
                        }}
                    </p>

                    @if ($certification->expiration_date)

                        <p>
                            Expires:
                            {{ $certification->expiration_date->format('F Y') }}
                        </p>

                    @endif

                    @if ($certification->credential_id)

                        <p>
                            Credential ID:
                            {{ $certification->credential_id }}
                        </p>

                    @endif

                    @if ($certification->credential_url)

                        <a href="{{ $certification->credential_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn-primary">
                            Verify Credential
                        </a>

                    @elseif ($certification->certificate_file)

                        <a href="{{ asset('storage/' . $certification->certificate_file) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn-primary">
                            View Certificate
                        </a>

                    @endif

                </article>

            @empty

                {{-- ==========================================
                     EMPTY STATE

                     Displayed when no certifications exist
                     in the Certifications CMS.
                ========================================== --}}

                <div class="certification-card">

                    <h3>No Certifications Yet</h3>

                    <p>
                        Professional certifications and training
                        will be added here as they become available.
                    </p>

                </div>

            @endforelse
        </div>

    </div>

</section>

@endsection