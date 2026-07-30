@extends('layouts.portfolio')

@section('title', 'Blog')

@section('content')

{{-- ==========================================
     COMPONENT: BLOG SECTION

     Purpose:
     Displays technical articles, software
     engineering insights and project
     case studies.
========================================== --}}

<section class="blog">

    <div class="container">

        <span class="section-tag">
            Technical Blog
        </span>

        <h2>Sharing Knowledge Through Software Engineering</h2>

        <p class="section-description">
            I enjoy documenting my development journey, sharing technical
            knowledge and explaining how modern software solutions are
            designed, built and maintained.
        </p>

        <div class="blog-grid">

            {{-- ==========================================
                 BLOG ARTICLE
                 Laravel
            ========================================== --}}

            <article class="blog-card">

                <h3>
                    Building Scalable Laravel Applications
                </h3>

                <p>
                    Best practices for creating maintainable Laravel
                    applications using clean architecture and reusable
                    components.
                </p>

                <a href="#" class="btn-primary">
                    Read Article
                </a>

            </article>

            {{-- ==========================================
                 BLOG ARTICLE
                 PHP
            ========================================== --}}

            <article class="blog-card">

                <h3>
                    Writing Better PHP Code
                </h3>

                <p>
                    Practical techniques for writing readable,
                    maintainable and efficient PHP applications.
                </p>

                <a href="#" class="btn-primary">
                    Read Article
                </a>

            </article>

            {{-- ==========================================
                 BLOG ARTICLE
                 Software Engineering
            ========================================== --}}

            <article class="blog-card">

                <h3>
                    Lessons Learned While Building Real Projects
                </h3>

                <p>
                    Insights, challenges and engineering decisions
                    from developing real-world software solutions.
                </p>

                <a href="#" class="btn-primary">
                    Read Article
                </a>

            </article>

        </div>

    </div>

</section>

@endsection