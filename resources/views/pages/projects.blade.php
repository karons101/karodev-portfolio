@extends('layouts.portfolio')

@section('title', 'Projects')

@section('content')

{{-- ==========================================
    COMPONENT: PROJECTS SECTION

    Purpose:
    Showcases enterprise-grade software
    solutions demonstrating full-stack
    development, software engineering
    and business problem-solving skills.
========================================== --}}

    <section class="projects">

        <div class="container">

            <span class="section-tag">
                My Portfolio
            </span>

            <h2>Featured Software Solutions</h2>

            <p class="section-description">
                A growing portfolio of modern software applications designed to
                solve real-world business challenges through scalable architecture,
                intuitive user experiences and robust engineering practices.
            </p>

            <div class="projects-grid">

                @forelse ($projects as $project)

                    @php
                        /*
                        |--------------------------------------------------------------------------
                        | CASE STUDY ROUTE MAPPING
                        |--------------------------------------------------------------------------
                        | These are the case-study pages that currently exist in KaroDev.
                        | The Project CMS does not store a case-study route, so we keep this
                        | small presentation-level mapping explicit rather than adding
                        | route-specific data to the database.
                        |--------------------------------------------------------------------------
                        */

                        $caseStudyRoutes = [
                            'NovaCareMed' => 'projects.novacare',
                            'courierxpress' => 'projects.courierxpress',
                            'yellowsail' => 'projects.yellow-sail',
                        ];

                        $caseStudyRoute = $caseStudyRoutes[$project->slug] ?? null;
                    @endphp

                    <article class="project-card">

                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">

                        <div class="project-content">

                            <span class="project-status completed">
                                Featured Project
                            </span>

                            <h3>{{ $project->title }}</h3>

                            <p>
                                {{ $project->short_description }}
                            </p>

                            @if ($project->technology)
                                <div class="project-tech">

                                    @foreach (explode(',', $project->technology) as $technology)
                                        <span>{{ trim($technology) }}</span>
                                    @endforeach

                                </div>
                            @endif

                            <div class="project-buttons">

                                @if ($project->live_demo_url)
                                    <a href="{{ $project->live_demo_url }}" target="_blank" rel="noopener noreferrer"
                                        class="btn-primary">
                                        Live Demo
                                    </a>
                                @endif

                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                                        class="btn-secondary">
                                        GitHub
                                    </a>
                                @endif

                                @if ($caseStudyRoute)
                                    <a href="{{ route($caseStudyRoute) }}" class="btn-secondary">
                                        View Case Study
                                    </a>
                                @endif

                            </div>

                        </div>

                    </article>

                @empty

                    <p class="projects-empty">
                        No projects are currently available.
                    </p>

                @endforelse

            </div>

        </div>

    </section>

@endsection