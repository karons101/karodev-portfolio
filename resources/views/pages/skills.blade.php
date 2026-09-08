@extends('layouts.portfolio')

@section('title', 'Skills')

@section('content')

{{-- ==========================================
     COMPONENT: SKILLS SECTION

     Purpose:
     Showcases the developer's technical
     skills using professional skill cards.
========================================== --}}

<section class="skills">

    <div class="container">

        <span class="section-tag">
            Technical Skills
        </span>

        <h2>Technologies I Work With</h2>

        <p class="section-description">
            I build modern, scalable applications using industry-standard
            technologies across frontend, backend, databases and version control.
        </p>

        <div class="skills-grid">

            {{-- ==========================================================
                 COMPONENT: DYNAMIC SKILL LIST

                 Purpose:
                 Renders skills retrieved from the Skills CMS.

                 Data Source:
                 $skills — Collection supplied by the public /skills route.

                 Ordering:
                 Skills are ordered by the CMS sort_order field.

                 Empty State:
                 Displays a fallback message when no skills exist.
            ========================================================== --}}

            @forelse ($skills as $skill)

                <div class="skill-card">

                    <h3>
                        {{ $skill->name }}
                    </h3>

                    <p>
                        {{ $skill->category }}
                    </p>

                </div>

            @empty

                <p class="skills-empty">
                    No skills are currently available.
                </p>

            @endforelse

        </div>

    </div>

</section>

@endsection