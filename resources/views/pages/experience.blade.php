@extends('layouts.portfolio')

@section('title', 'Experience')

@section('content')

{{-- ==========================================
     COMPONENT: EXPERIENCE SECTION

     Purpose:
     Highlights the developer's professional
     journey, major projects and career growth.
========================================== --}}

<section class="experience">

    <div class="container">

        <span class="section-tag">
            Experience
        </span>

        <h2>Professional Journey</h2>

        <p class="section-description">
            My experience is built through designing and developing software
            solutions that solve real-world business challenges across
            multiple industries.
        </p>

        <div class="timeline">

            {{-- ==========================================
                 DYNAMIC EXPERIENCE TIMELINE

                 Purpose:
                 Renders professional experience from the
                 Experience CMS instead of hardcoded entries.

                 Data source:
                 experiences table via the public route.

                 Display:
                 - Employment period
                 - Position and company
                 - Employment type
                 - Location
                 - Work mode
                 - Description
                 - Technologies
            ========================================== --}}

            @forelse ($experiences as $experience)

                <article class="timeline-item">

                    <div class="timeline-dot"></div>

                    <div class="timeline-content">

                        <span class="timeline-year">

                            {{ $experience->start_date->format('M Y') }}

                            —

                            @if ($experience->currently_working)

                                Present

                            @elseif ($experience->end_date)

                                {{ $experience->end_date->format('M Y') }}

                            @else

                                End date unavailable

                            @endif

                        </span>

                        <h3>
                            {{ $experience->position }}
                        </h3>

                        <h4>
                            {{ $experience->company }}
                        </h4>

                        <p>
                            <strong>{{ $experience->employment_type }}</strong>

                            @if ($experience->city || $experience->country)
                                ·
                                {{ collect([$experience->city, $experience->country])->filter()->join(', ') }}
                            @endif

                            ·
                            {{ $experience->work_mode }}
                        </p>

                        <p>
                            {{ $experience->description }}
                        </p>

                        @if ($experience->technologies)

                            <p>
                                <strong>Technologies:</strong>
                                {{ $experience->technologies }}
                            </p>

                        @endif

                    </div>

                </article>

            @empty

                <p>
                    No professional experience is currently available.
                </p>

            @endforelse

        </div>

    </div>

</section>

@endsection